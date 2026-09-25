<?php

namespace Tests\Feature;

use App\Models\Loss;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserBalanceAdjustmentLossTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }

    private function userWithFunds(float $balance, float $profits): User
    {
        return User::factory()->create([
            'is_admin' => false,
            'balance' => $balance,
            'total_profits' => $profits,
        ]);
    }

    private function adjust(User $admin, User $target, array $payload)
    {
        return $this->actingAs($admin)->put(route('admin.users.update', $target->id), $payload);
    }

    private function lossPayload(User $target, float $amount, ?string $description = null): array
    {
        return array_filter([
            'transaction_type' => 'loss',
            'amount' => $amount,
            'description' => $description,
        ], fn ($v) => $v !== null);
    }

    public function test_loss_is_offered_in_the_balance_adjustment_dropdown(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(100, 0);

        $this->actingAs($admin)
            ->get(route('admin.users.edit', $user->id))
            ->assertOk()
            ->assertSee('value="loss"', false)
            ->assertSee('deduct from total profits, then balance');
    }

    public function test_loss_deducts_profits_before_balance(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(500, 300);

        $this->adjust($admin, $user, $this->lossPayload($user, 250))
            ->assertRedirect(route('admin.users'));

        $user->refresh();
        $this->assertEquals(50.00, (float) $user->total_profits);  // 300 - 250, profits absorb it all
        $this->assertEquals(500.00, (float) $user->balance);     // untouched, nothing spilled over
    }

    public function test_loss_spills_from_profits_into_balance(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 50);

        $this->adjust($admin, $user, $this->lossPayload($user, 500));

        $user->refresh();
        $this->assertEquals(0.00, (float) $user->total_profits);
        $this->assertEquals(550.00, (float) $user->balance);
    }

    public function test_loss_never_drives_funds_negative(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(40, 60);

        $this->adjust($admin, $user, $this->lossPayload($user, 100));

        $user->refresh();
        $this->assertEquals(0.00, (float) $user->total_profits);
        $this->assertEquals(0.00, (float) $user->balance);
    }

    public function test_loss_larger_than_available_funds_is_rejected(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(100, 50);

        $this->adjust($admin, $user, $this->lossPayload($user, 500))
            ->assertSessionHas('error');

        $user->refresh();
        $this->assertEquals(100.00, (float) $user->balance);
        $this->assertEquals(50.00, (float) $user->total_profits);
        $this->assertSame(0, Transaction::count());
    }

    public function test_loss_writes_a_loss_ledger_entry(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(200, 100);

        $this->adjust($admin, $user, $this->lossPayload($user, 120, 'Margin call'));

        $tx = Transaction::where('type', 'loss')->first();
        $this->assertNotNull($tx);
        $this->assertEquals(120.00, (float) $tx->amount);
        $this->assertEquals(200.00, (float) $tx->balance_before);
        $this->assertEquals(180.00, (float) $tx->balance_after);  // 100 profits + 20 balance
        $this->assertEquals(100.00, (float) $tx->profit_before);
        $this->assertEquals(0.00, (float) $tx->profit_after);
        $this->assertStringStartsWith('LOSS-', $tx->reference);
        $this->assertStringContainsString('Margin call', $tx->description);
    }

    public function test_loss_with_no_profits_deducts_from_balance_only(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(800, 0);

        $this->adjust($admin, $user, $this->lossPayload($user, 300));

        $user->refresh();
        $this->assertEquals(0.00, (float) $user->total_profits);
        $this->assertEquals(500.00, (float) $user->balance);

        $tx = Transaction::where('type', 'loss')->first();
        $this->assertEquals(0.00, (float) $tx->profit_before);
        $this->assertEquals(0.00, (float) $tx->profit_after);
    }

    public function test_existing_adjustment_types_still_work(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(200, 50);

        $this->adjust($admin, $user, ['transaction_type' => 'credit', 'amount' => 100]);
        $this->adjust($admin, $user, ['transaction_type' => 'debit', 'amount' => 50]);
        $this->adjust($admin, $user, ['transaction_type' => 'profit', 'amount' => 25]);

        $user->refresh();
        $this->assertEquals(250.00, (float) $user->balance);
        $this->assertEquals(75.00, (float) $user->total_profits);

        $this->assertSame(1, Transaction::where('type', 'deposit')->count());
        $this->assertSame(1, Transaction::where('type', 'withdrawal')->count());
        $this->assertSame(1, Transaction::where('type', 'profit')->count());
    }

    public function test_unknown_transaction_type_is_rejected(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(200, 50);

        $this->actingAs($admin)
            ->put(route('admin.users.update', $user->id), [
                'transaction_type' => 'steal_funds',
                'amount' => 100,
            ])
            ->assertSessionHasErrors('transaction_type');

        $this->assertSame(0, Transaction::count());
    }

    public function test_applying_a_loss_records_the_split_for_reversal(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 50);

        $this->adjust($admin, $user, $this->lossPayload($user, 500, 'Margin call'));

        $loss = Loss::where('user_id', $user->id)->firstOrFail();
        $this->assertEquals(500.00, (float) $loss->amount);
        $this->assertEquals(50.00, (float) $loss->profit_deducted);
        $this->assertEquals(450.00, (float) $loss->balance_deducted);
        $this->assertSame('applied', $loss->status);
        $this->assertSame($admin->id, $loss->admin_id);
        $this->assertSame('Margin call', $loss->reason);
        $this->assertNotNull($loss->applied_at);
    }

    public function test_loss_can_be_reversed_restoring_the_exact_split(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 50);

        $this->adjust($admin, $user, $this->lossPayload($user, 500));
        $user->refresh();
        $this->assertEquals(0.00, (float) $user->total_profits);
        $this->assertEquals(550.00, (float) $user->balance);

        $loss = Loss::where('user_id', $user->id)->firstOrFail();

        $this->actingAs($admin)
            ->post(route('admin.users.losses.reverse', $loss->id), ['reversal_reason' => 'Applied in error'])
            ->assertRedirect(route('admin.users.edit', $user->id));

        $user->refresh();
        // Back to exactly where they started.
        $this->assertEquals(50.00, (float) $user->total_profits);
        $this->assertEquals(1000.00, (float) $user->balance);

        $loss->refresh();
        $this->assertSame('reversed', $loss->status);
        $this->assertSame('Applied in error', $loss->reversal_reason);
        $this->assertSame($admin->id, $loss->reversed_by);
        $this->assertNotNull($loss->reversed_at);
    }

    public function test_reversal_is_idempotent_and_cannot_double_refund(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 0);

        $this->adjust($admin, $user, $this->lossPayload($user, 300));
        $loss = Loss::where('user_id', $user->id)->firstOrFail();

        $this->actingAs($admin)->post(route('admin.users.losses.reverse', $loss->id));
        $this->actingAs($admin)->post(route('admin.users.losses.reverse', $loss->id))
            ->assertSessionHas('error');

        $user->refresh();
        $this->assertEquals(1000.00, (float) $user->balance);
        $this->assertSame(1, Transaction::where('type', 'loss_reversal')->count());
    }

    public function test_reversal_keeps_the_loss_transaction_completed_for_pnl(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 0);

        $this->adjust($admin, $user, $this->lossPayload($user, 300));
        $loss = Loss::where('user_id', $user->id)->firstOrFail();
        $this->actingAs($admin)->post(route('admin.users.losses.reverse', $loss->id));

        // Original stays 'completed' (-300) and a +300 reversal nets to zero.
        $original = Transaction::where('type', 'loss')->firstOrFail();
        $this->assertSame('completed', $original->status);

        $reversal = Transaction::where('type', 'loss_reversal')->firstOrFail();
        $this->assertEquals(300.00, (float) $reversal->amount);
        $this->assertStringStartsWith('LOSS-REV-', $reversal->reference);
        // The two entries must cancel out so PnL shows no change.
        $this->assertEquals(0.00, round(-1 * (float) $original->amount + (float) $reversal->amount, 2));
    }

    public function test_loss_history_is_visible_on_the_user_page_with_reverse_action(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 0);

        $this->adjust($admin, $user, $this->lossPayload($user, 300, 'Liquidation'));
        $loss = Loss::where('user_id', $user->id)->firstOrFail();

        $this->actingAs($admin)
            ->get(route('admin.users.edit', $user->id))
            ->assertOk()
            ->assertSee('Loss History')
            ->assertSee('Liquidation')
            ->assertSee(route('admin.users.losses.reverse', $loss->id), false)
            ->assertSee('Reverse', false);
    }

    public function test_reversed_loss_shows_as_reversed_without_a_reverse_button(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 0);

        $this->adjust($admin, $user, $this->lossPayload($user, 300));
        $loss = Loss::where('user_id', $user->id)->firstOrFail();
        $this->actingAs($admin)->post(route('admin.users.losses.reverse', $loss->id));

        $this->actingAs($admin)
            ->get(route('admin.users.edit', $user->id))
            ->assertOk()
            ->assertSee('Reversed')
            ->assertDontSee('action="' . route('admin.users.losses.reverse', $loss->id) . '"', false);
    }

    public function test_guests_and_non_admins_cannot_reverse_a_loss(): void
    {
        $admin = $this->admin();
        $user = $this->userWithFunds(1000, 0);
        $this->adjust($admin, $user, $this->lossPayload($user, 300));
        $loss = Loss::where('user_id', $user->id)->firstOrFail();

        // A regular logged-in user is bounced by AdminMiddleware.
        $this->actingAs($user)
            ->post(route('admin.users.losses.reverse', $loss->id))
            ->assertRedirect('/');

        // A guest is bounced by the auth middleware.
        $this->app['auth']->forgetGuards();
        $this->post(route('admin.users.losses.reverse', $loss->id))->assertRedirect();

        $user->refresh();
        $this->assertEquals(700.00, (float) $user->balance);
        $this->assertSame('applied', $loss->fresh()->status);
        $this->assertSame(0, Transaction::where('type', 'loss_reversal')->count());
    }
}
