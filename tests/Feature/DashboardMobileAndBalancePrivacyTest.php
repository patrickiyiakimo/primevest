<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardMobileAndBalancePrivacyTest extends TestCase
{
    use RefreshDatabase;

    private function dashboardHtml(): string
    {
        $user = User::factory()->create(['balance' => 5000, 'total_profits' => 1250]);
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'amount' => 5000,
            'balance_before' => 0,
            'balance_after' => 5000,
            'status' => 'completed',
            'reference' => 'DEP-TEST',
        ]);

        $this->actingAs($user);
        $response = $this->get(route('dashboard'));
        $response->assertOk();

        return $response->getContent();
    }

    /* ---------------- Chart responsiveness ---------------- */

    public function test_chart_canvas_does_not_rely_on_an_inline_percentage_height(): void
    {
        $html = $this->dashboardHtml();

        // An inline height:100% on the canvas is what broke on mobile: with an
        // auto-height parent the percentage cannot resolve, so the canvas falls
        // back to its intrinsic 300x150 and Chart.js resizes in a feedback loop.
        $this->assertStringNotContainsString('height:100%;width:100%', $html);
        $this->assertMatchesRegularExpression('/<canvas id="growthChart"[^>]*>/', $html);
    }

    public function test_chart_box_gets_a_definite_height_on_narrow_screens(): void
    {
        $html = $this->dashboardHtml();

        $this->assertStringContainsString('.pv-chart-box canvas{position:absolute!important', $html);
        // Mobile rule must pin an explicit height rather than a min-height.
        $this->assertStringContainsString('.pv-chart-box{flex:none;height:300px;min-height:0}', $html);
    }

    public function test_performance_stats_use_a_wrapping_grid_instead_of_raw_flex(): void
    {
        $html = $this->dashboardHtml();

        // minmax(0,1fr) stops long monospace amounts forcing horizontal overflow.
        $this->assertStringContainsString('.pv-perf-stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr))', $html);
        $this->assertStringContainsString('.pv-perf-stats{grid-template-columns:1fr;gap:12px}', $html);
    }

    public function test_market_overview_height_is_responsive(): void
    {
        $html = $this->dashboardHtml();

        $this->assertStringContainsString('.pv-tv-ov{height:590px', $html);
        $this->assertStringContainsString('.pv-tv-ov{height:420px}', $html);
        // The old fixed inline height could not be overridden by a media query.
        $this->assertStringNotContainsString('style="height:590px', $html);
    }

    public function test_section_headers_wrap_on_small_screens(): void
    {
        $html = $this->dashboardHtml();

        $this->assertStringContainsString('.sec-h{flex-wrap:wrap;row-gap:10px}', $html);
    }

    /* ---------------- Balance privacy toggle ---------------- */

    public function test_balances_and_kpi_cards_expose_eye_toggles(): void
    {
        $html = $this->dashboardHtml();

        // 4 KPI cards + the Portfolio Performance header. Counting the button
        // markup avoids matching the two JS selector strings.
        $this->assertSame(5, substr_count($html, 'class="pv-eye" data-pv-eye'));
    }

    public function test_eye_toggles_are_keyboard_accessible_buttons(): void
    {
        $html = $this->dashboardHtml();

        $this->assertStringContainsString('type="button" class="pv-eye" data-pv-eye aria-pressed="false"', $html);
    }

    public function test_balance_amounts_are_wrapped_for_masking(): void
    {
        $html = $this->dashboardHtml();

        // Total balance, the Main/Profits breakdown, and the perf stats.
        $this->assertStringContainsString('class="val num pv-money"', $html);
        $this->assertStringContainsString('class="sub pv-money"', $html);
        $this->assertStringContainsString('class="pv-money num"', $html);
    }

    public function test_toggle_state_is_persisted_in_local_storage(): void
    {
        $html = $this->dashboardHtml();

        $this->assertStringContainsString("localStorage.setItem(KEY,on?'1':'0')", $html);
        $this->assertStringContainsString("localStorage.getItem(KEY)==='1'", $html);
    }

    public function test_stored_state_is_applied_before_balances_are_painted(): void
    {
        $html = $this->dashboardHtml();

        // The inline early-apply script must come before the KPI markup,
        // otherwise a refresh flashes the amounts before masking them.
        $early = strpos($html, "classList.toggle('pv-balances-hidden',h)");
        $firstCard = strpos($html, 'Total Balance');

        $this->assertNotFalse($early);
        $this->assertNotFalse($firstCard);
        $this->assertLessThan($firstCard, $early);
    }

    public function test_masking_uses_blur_so_layout_does_not_shift(): void
    {
        $html = $this->dashboardHtml();

        $this->assertStringContainsString('.pv-balances-hidden .pv-money{filter:blur(7px)', $html);
    }

    public function test_no_duplicate_class_attributes_were_introduced(): void
    {
        $html = $this->dashboardHtml();

        // A duplicate class attribute silently drops the first one, which would
        // stop the balance from being masked at all.
        $this->assertDoesNotMatchRegularExpression('/<div[^>]*\sclass="[^"]*"[^>]*\sclass="/', $html);
    }

    public function test_positions_count_stays_visible_when_balances_are_masked(): void
    {
        $html = $this->dashboardHtml();

        // The count is not a balance and should not be blurred.
        $this->assertStringContainsString('<div class="val num">', $html);
    }
}
