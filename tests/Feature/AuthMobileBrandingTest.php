<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthMobileBrandingTest extends TestCase
{
    private function guestLayout(): string
    {
        return (string) file_get_contents(resource_path('views/layouts/guest.blade.php'));
    }

    public function test_login_page_renders(): void
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_register_page_renders(): void
    {
        $this->get(route('register'))->assertOk();
    }

    public function test_back_link_and_form_logo_are_hidden_on_phones(): void
    {
        $css = $this->guestLayout();
        $this->assertStringContainsString('.auth-back{display:none}', $css);
        $this->assertStringContainsString('.auth-right .pv-logo{display:none}', $css);
    }

    public function test_hiding_rules_live_in_the_phone_breakpoint(): void
    {
        $css = $this->guestLayout();
        // scoped to the same breakpoint that stacks the two-column auth shell
        $this->assertStringContainsString('@media(max-width:899px)', $css);

        $start = strpos($css, '@media(max-width:899px)');
        $block = substr($css, $start, 700);
        $this->assertStringContainsString('.auth-back{display:none}', $block);
        $this->assertStringContainsString('.auth-right .pv-logo{display:none}', $block);
    }

    public function test_desktop_auth_pages_keep_the_back_link_and_logo(): void
    {
        $css = $this->guestLayout();
        // No global rule may remove them, otherwise desktop loses them too.
        $before = substr($css, 0, strpos($css, '@media(max-width:899px)'));
        $this->assertStringNotContainsString('.auth-back{display:none}', $before);
        $this->assertStringNotContainsString('.auth-right .pv-logo{display:none}', $before);
        // the markup itself is untouched and still rendered for desktop
        $this->assertStringContainsString('class="auth-back"', $css);
        $this->assertStringContainsString('Back to PrimeVest', $css);
        $this->assertStringContainsString('class="pv-logo"', $css);
    }

    public function test_main_brand_logo_and_wordmark_are_kept(): void
    {
        $css = $this->guestLayout();
        // .auth-brand (logo + "PrimeVest") must survive on phones
        $start = strpos($css, '@media(max-width:899px)');
        $block = substr($css, $start, 700);
        $this->assertStringNotContainsString('.auth-brand{display:none}', $block);
        $this->assertStringNotContainsString('display:none', str_replace(
            ['.auth-hero p,.auth-feats,.auth-stats{display:none}',
             '.auth-back{display:none}',
             '.auth-right .pv-logo{display:none}'],
            '',
            $block
        ));
    }

    public function test_brand_panel_markup_is_intact(): void
    {
        $css = $this->guestLayout();
        $this->assertStringContainsString('<div class="auth-brand">', $css);
        $this->assertStringContainsString('<span>PrimeVest</span>', $css);
        $this->assertStringContainsString("alt=\"PrimeVest\"", $css);
    }

    public function test_theme_toggle_stays_right_aligned_on_phones(): void
    {
        // With the back link hidden the topbar has one child, so space-between
        // would pull the toggle to the left edge.
        $css = $this->guestLayout();
        $this->assertStringContainsString('.auth-topbar{justify-content:flex-end}', $css);
        $this->assertStringContainsString('@include(\'partials.theme-btn\')', $css);
    }
}
