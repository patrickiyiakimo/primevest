<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardMobileNavbarTest extends TestCase
{
    use RefreshDatabase;

    private string $html;

    private function render(): string
    {
        if (!isset($this->html)) {
            $user = User::factory()->create(['name' => 'Test User']);
            $this->html = $this->actingAs($user)->get(route('dashboard'))->assertOk()->getContent();
        }

        return $this->html;
    }

    /** The rendered <header class="topbar"> markup. */
    private function navbar(): string
    {
        $html = $this->render();
        $start = strpos($html, '<header class="topbar">');
        $end = strpos($html, '</header>');
        $this->assertNotFalse($start);
        $this->assertNotFalse($end);

        return substr($html, $start, $end - $start);
    }

    /** All inline CSS: the theme partial's <style> plus the layout's own. */
    private function styles(): string
    {
        $html = $this->render();
        $start = strpos($html, '<style>');
        $end = strrpos($html, '</style>');
        $this->assertNotFalse($start);
        $this->assertNotFalse($end);

        return substr($html, $start, $end - $start);
    }

    public function test_profile_dropdown_is_hidden_on_mobile(): void
    {
        $this->assertStringContainsString('.topbar .udrop{display:none}', $this->styles());
    }

    public function test_the_hiding_rule_is_inside_the_mobile_media_query(): void
    {
        // A bare ".udrop{display:none}" outside the breakpoint would hide the
        // dropdown on desktop too.
        $styles = $this->styles();

        $mq = strpos($styles, '@media(max-width:1000px)');
        $rule = strpos($styles, '.topbar .udrop{display:none}');
        $this->assertNotFalse($mq);
        $this->assertGreaterThan($mq, $rule);
    }

    public function test_profile_and_logout_remain_reachable_in_the_mobile_drawer(): void
    {
        $html = $this->render();

        // Hiding the navbar dropdown must not remove the only route to these.
        $this->assertStringContainsString(route('profile'), $html);
        $this->assertStringContainsString(route('logout'), $html);
        $this->assertStringContainsString('pvOpenSide()', $html);
    }

    public function test_title_block_can_shrink_so_it_does_not_squeeze_the_navbar(): void
    {
        $this->assertStringContainsString('class="pv-topbar-title"', $this->navbar());
        $this->assertStringContainsString('.pv-topbar-title{min-width:0}', $this->styles());
    }

    public function test_deposit_and_theme_toggle_stay_in_the_mobile_navbar(): void
    {
        $navbar = $this->navbar();

        $this->assertStringContainsString(route('deposit'), $navbar);
        $this->assertStringContainsString('pv-theme-btn', $navbar);
    }
}
