<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KycVerifiedCelebrationTest extends TestCase
{
    use RefreshDatabase;

    private function renderFor(string $status, bool $withDate = true): string
    {
        $user = User::factory()->create([
            'kyc_status' => $status,
            'kyc_verified_at' => $withDate ? now() : null,
        ]);

        return $this->actingAs($user)->get(route('kyc.status'))->assertOk()->getContent();
    }

    public function test_confetti_renders_for_verified_kyc(): void
    {
        $html = $this->renderFor('verified');

        $this->assertStringContainsString('<canvas id="pvConfetti"', $html);
    }

    public function test_confetti_is_never_rendered_for_other_statuses(): void
    {
        foreach (['pending', 'rejected', 'not_submitted'] as $status) {
            $this->assertStringNotContainsString(
                'pvConfetti',
                $this->renderFor($status),
                "Confetti must not appear for kyc_status={$status}."
            );
        }
    }

    public function test_confetti_is_scoped_to_the_signed_in_account(): void
    {
        // A per-user key stops one account's celebration from suppressing
        // another account's on a shared browser.
        $a = User::factory()->create(['kyc_status' => 'verified', 'kyc_verified_at' => now()]);
        $b = User::factory()->create(['kyc_status' => 'verified', 'kyc_verified_at' => now()]);

        $htmlA = $this->actingAs($a)->get(route('kyc.status'))->getContent();
        $htmlB = $this->actingAs($b)->get(route('kyc.status'))->getContent();

        $this->assertStringContainsString('pv-kyc-celebrated-'.$a->id, $htmlA);
        $this->assertStringContainsString('pv-kyc-celebrated-'.$b->id, $htmlB);
        $this->assertStringNotContainsString('pv-kyc-celebrated-'.$a->id, $htmlB);
    }

    public function test_one_time_flag_is_written_to_local_storage_before_animating(): void
    {
        $html = $this->renderFor('verified');

        // Setting the key before the RAF loop prevents a double fire on reload.
        $setAt = strpos($html, "localStorage.setItem(KEY,'1')");
        $loopAt = strpos($html, 'requestAnimationFrame(frame)');

        $this->assertNotFalse($setAt);
        $this->assertNotFalse($loopAt);
        $this->assertLessThan($loopAt, $setAt);
    }

    public function test_one_time_flag_is_checked_before_anything_is_drawn(): void
    {
        $html = $this->renderFor('verified');

        $readAt = strpos($html, "localStorage.getItem(KEY) === '1'");
        $burstAt = strpos($html, 'burst(W*0.50');

        $this->assertNotFalse($readAt);
        $this->assertNotFalse($burstAt);
        $this->assertLessThan($burstAt, $readAt);
    }

    public function test_confetti_respects_reduced_motion(): void
    {
        $html = $this->renderFor('verified');

        $this->assertStringContainsString("prefers-reduced-motion: reduce", $html);
    }

    public function test_confetti_overlay_never_blocks_interaction(): void
    {
        $html = $this->renderFor('verified');

        // A full-screen overlay without pointer-events:none would freeze the page.
        $this->assertStringContainsString('#pvConfetti{position:fixed;inset:0;z-index:9998;pointer-events:none}', $html);
    }

    public function test_confetti_cleans_up_after_animating(): void
    {
        $html = $this->renderFor('verified');

        $this->assertStringContainsString("canvas.remove();", $html);
        $this->assertStringContainsString("window.removeEventListener('resize', size)", $html);
    }

    public function test_verified_page_shows_a_cheque_badge_and_approval_date(): void
    {
        $html = $this->renderFor('verified', withDate: true);

        $this->assertStringContainsString('pv-kyc-celebrate', $html);
        $this->assertStringContainsString('Verified on', $html);
    }

    public function test_verified_page_hides_the_submit_button_but_others_keep_it(): void
    {
        $verified = $this->renderFor('verified');
        $pending = $this->renderFor('pending');

        $this->assertStringNotContainsString('Submit / Update Documents', $verified);
        $this->assertStringContainsString('Submit / Update Documents', $pending);
    }

    public function test_identity_check_reads_active_only_once_verified(): void
    {
        $verified = $this->renderFor('verified');
        $pending = $this->renderFor('pending');

        // "Identity verified ● Active" only once the status is actually verified.
        $this->assertMatchesRegularExpression('/Identity verified<\/span><span class="pill pill-g">● Active/', $verified);
        $this->assertMatchesRegularExpression('/Identity verified<\/span><span class="pill pill-y">○ Optional/', $pending);
    }
}
