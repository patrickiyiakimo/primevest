<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MobileFundingOnboardingTest extends TestCase
{
    use RefreshDatabase;

    private function newUser(array $attrs = []): User
    {
        return User::factory()->create(array_merge(['balance' => 0], $attrs));
    }

    private function deposit(User $user, string $status = 'completed'): Transaction
    {
        return Transaction::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'amount' => 500,
            'balance_before' => 0,
            'balance_after' => 500,
            'profit_before' => 0,
            'profit_after' => 0,
            'status' => $status,
            'reference' => 'REF-1',
            'description' => 'test',
            'payment_method' => 'bank',
        ]);
    }

    private function dash(User $user): string
    {
        return $this->actingAs($user)->get(route('dashboard'))->assertOk()->getContent();
    }

    /**
     * Markup only. The dashboard's <style>/<script> blocks ship inside the same
     * HTML, so a naive substring count also matches class names declared in CSS
     * and selectors inside JS.
     */
    private function markup(User $user): string
    {
        $html = $this->dash($user);
        $html = preg_replace('#<style\b.*?</style>#si', '', $html);
        $html = preg_replace('#<script\b.*?</script>#si', '', $html);

        return $html;
    }

    /* ---------------- trigger conditions ---------------- */

    public function test_new_unfunded_account_sees_the_prompt(): void
    {
        $this->assertStringContainsString('data-pv-onb', $this->dash($this->newUser()));
    }

    public function test_prompt_disappears_once_the_account_is_funded(): void
    {
        $user = $this->newUser();
        $this->deposit($user);
        $html = $this->dash($user);
        $this->assertStringNotContainsString('data-pv-onb', $html);
        $this->assertStringNotContainsString('pv-dash-needs-funding', $this->markup($user));
    }

    public function test_pending_deposit_does_not_count_as_funded(): void
    {
        $user = $this->newUser();
        $this->deposit($user, 'pending');
        $this->assertStringContainsString('data-pv-onb', $this->dash($user));
    }

    public function test_prompt_expires_after_the_onboarding_window(): void
    {
        $user = $this->newUser();
        $user->forceFill(['created_at' => now()->subDays(8)])->save();
        $this->assertStringNotContainsString('data-pv-onb', $this->dash($user));
    }

    public function test_prompt_is_still_shown_on_the_last_day_of_the_window(): void
    {
        $user = $this->newUser();
        $user->forceFill(['created_at' => now()->subDays(7)])->save();
        $this->assertStringContainsString('data-pv-onb', $this->dash($user));
    }

    /* ---------------- mobile only ---------------- */

    public function test_prompt_is_hidden_outside_the_phone_breakpoint(): void
    {
        $html = $this->dash($this->newUser());
        // Hidden by default, revealed only under 768px.
        $this->assertStringContainsString('.pv-onb{display:none}', $html);
        $this->assertStringContainsString('@media(max-width:768px)', $html);
        $this->assertStringContainsString('.pv-onb{display:flex', $html);
    }

    public function test_prompt_never_uses_a_tablet_width_rule(): void
    {
        $html = $this->dash($this->newUser());
        // A min-width rule would leak the dialog onto larger screens.
        $this->assertStringNotContainsString('@media(min-width:769px)', $html);
        $this->assertStringNotContainsString('@media(min-width:768px)', $html);
    }

    /* ---------------- content: minimal by design ---------------- */

    public function test_prompt_leads_with_the_single_required_message(): void
    {
        $this->assertStringContainsString('Fund your account to start trading', $this->dash($this->newUser()));
    }

    public function test_prompt_offers_a_single_deposit_action(): void
    {
        $html = $this->markup($this->newUser());
        $this->assertStringContainsString('pv-onb-cta', $html);
        $this->assertStringContainsString('Deposit Funds', $html);
        $this->assertStringContainsString(route('deposit'), $html);
    }

    public function test_prompt_has_no_multistep_content(): void
    {
        $html = $this->markup($this->newUser());
        // The earlier version carried a 3-step list, progress bar and day counter.
        $this->assertStringNotContainsString('pv-onb-steps', $html);
        $this->assertStringNotContainsString('pv-onb-prog', $html);
        $this->assertStringNotContainsString('Verify your identity', $html);
        $this->assertStringNotContainsString('Start trading or staking', $html);
        $this->assertStringNotContainsString('Day 1 of 7', $html);
        $this->assertStringNotContainsString('<ol', $html);
    }

    public function test_prompt_uses_no_gradients(): void
    {
        $html = $this->dash($this->newUser());
        $start = strpos($html, '.pv-onb{');
        $css = substr($html, $start, 2600);
        $this->assertStringNotContainsString('linear-gradient', $css);
        $this->assertStringNotContainsString('radial-gradient', $css);
    }

    public function test_deposit_buttons_use_the_brand_blue_not_gold(): void
    {
        $html = $this->dash($this->newUser());
        $start = strpos($html, '.pv-onb{');
        $css = substr($html, $start, 2600);

        // solid brand accent, flat
        $this->assertStringContainsString('background:var(--acc);color:#03140d', $css);
        // no gold anywhere in the dialog styles
        $this->assertStringNotContainsString('--gold', $css);
        $this->assertStringNotContainsString('btn-gold', $css);
    }

    /* ---------------- single, non-repeating prompt ---------------- */

    public function test_no_reminder_bar_repeats_the_prompt(): void
    {
        $html = $this->markup($this->newUser());
        // The dialog is the only funding prompt; a bar would repeat it on every view.
        $this->assertStringNotContainsString('data-pv-onb-bar', $html);
        $this->assertStringNotContainsString('pv-onb-bar', $html);
        $this->assertSame(1, substr_count($html, 'Fund your account to start trading'));
    }

    public function test_prompt_renders_on_the_dashboard_route_only(): void
    {
        $user = $this->newUser();
        // The dialog lives in the dashboard view, so other authenticated pages
        // can never trigger it.
        $deposit = $this->actingAs($user)->get(route('deposit'))->assertOk()->getContent();
        $this->assertStringNotContainsString('data-pv-onb', $deposit);

        $history = $this->actingAs($user)->get(route('deposits-history'))->assertOk()->getContent();
        $this->assertStringNotContainsString('data-pv-onb', $history);
    }

    public function test_quick_actions_deposit_button_is_marked_for_mobile_hide(): void
    {
        $html = $this->markup($this->newUser());
        // The duplicate Deposit Funds button in Quick Actions
        $this->assertStringContainsString('btn btn-block pv-onb-hide-sm', $html);
        // but a funded account keeps it
        $funded = $this->newUser();
        $this->deposit($funded);
        $this->assertStringContainsString('>⬆ Deposit Funds</a>', $this->markup($funded));
    }

    public function test_staking_and_buy_crypto_actions_are_never_hidden(): void
    {
        $html = $this->markup($this->newUser());
        $this->assertStringContainsString('Start Staking', $html);
        $this->assertStringContainsString('Buy Crypto', $html);
    }

    public function test_prompt_is_a_dark_dialog_in_both_themes(): void
    {
        $html = $this->dash($this->newUser());
        // Flat dark surface, not a theme token, so it stays dark in light mode too.
        $this->assertStringContainsString('background:#0d1320', $html);
        $this->assertStringNotContainsString('[data-theme="light"] .pv-onb', $html);
    }

    public function test_prompt_is_announced_as_a_dialog(): void
    {
        $html = $this->markup($this->newUser());
        $this->assertStringContainsString('role="dialog"', $html);
        $this->assertStringContainsString('aria-modal="true"', $html);
        $this->assertStringContainsString('aria-labelledby="pv-onb-title"', $html);
    }

    public function test_prompt_respects_reduced_motion(): void
    {
        $this->assertStringContainsString('@media(prefers-reduced-motion:reduce)', $this->dash($this->newUser()));
    }

    /* ---------------- dismissal ---------------- */

    public function test_dismissal_is_scoped_per_account(): void
    {
        $a = $this->newUser();
        $b = $this->newUser();
        $this->assertStringContainsString('pv-funding-onb-'.$a->id, $this->dash($a));
        $this->assertStringContainsString('pv-funding-onb-'.$b->id, $this->dash($b));
        $this->assertStringNotContainsString('pv-funding-onb-'.$b->id, $this->dash($a));
    }

    public function test_dismissal_state_is_read_before_paint(): void
    {
        $html = $this->dash($this->newUser());
        // Applied in a pre-paint script so the dialog never flashes on reload.
        $this->assertStringContainsString("localStorage.getItem(KEY)==='1'", $html);
        $this->assertStringContainsString('pv-onb-dismissed', $html);
    }

    public function test_dismiss_buttons_are_labelled(): void
    {
        $html = $this->markup($this->newUser());
        $this->assertSame(1, substr_count($html, 'data-pv-onb-close'));
        $this->assertStringContainsString('aria-label="Dismiss"', $html);
    }

    /* ---------------- empty-dashboard tidy up ---------------- */

    public function test_funded_dashboard_keeps_all_its_sections(): void
    {
        $user = $this->newUser();
        $this->deposit($user);
        $html = $this->markup($user);
        // The collapse rule is scoped to the onboarding wrapper, which a funded
        // account never receives, so every block stays visible.
        $this->assertStringNotContainsString('pv-dash-needs-funding', $html);
        $this->assertStringContainsString('Market Overview', $html);
        $this->assertStringContainsString('Market Screener', $html);
        $this->assertStringContainsString('Recent Transactions', $html);
    }

    public function test_unfunded_new_account_collapses_the_empty_market_widgets(): void
    {
        $html = $this->markup($this->newUser());
        // screener + market overview + transactions table + quick-action deposit
        $this->assertSame(4, substr_count($html, 'pv-onb-hide-sm'));
        // and only for this state, only on mobile
        $this->assertStringContainsString(
            '.pv-dash-needs-funding .pv-onb-hide-sm{display:none}',
            $this->dash($this->newUser())
        );
    }
}
