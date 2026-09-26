<?php

namespace Tests\Feature;

use Tests\TestCase;

class PricingPageTest extends TestCase
{
    private function html(): string
    {
        return $this->get(route('pricing'))->assertOk()->getContent();
    }

    private function pricingSource(): string
    {
        return (string) file_get_contents(resource_path('views/pages/pricing.blade.php'));
    }

    private function navbar(): string
    {
        $home = $this->get('/')->assertOk()->getContent();
        $start = strpos($home, '<nav class="pv-nav"');
        $end = strpos($home, '</nav>');
        $this->assertNotFalse($start);
        $this->assertNotFalse($end);

        return substr($home, $start, $end - $start);
    }

    public function test_pricing_page_renders(): void
    {
        $this->assertStringContainsString('Account plans that scale with your capital', $this->html());
    }

    public function test_all_four_tiers_are_present(): void
    {
        $html = $this->html();
        foreach (['Basic', 'Standard', 'Silver', 'Gold'] as $tier) {
            $this->assertStringContainsString($tier.' plan', $html);
        }
        $this->assertSame(4, substr_count($html, 'class="pr-card'));
    }

    public function test_tier_minimum_funding_amounts(): void
    {
        $html = $this->html();
        foreach (['500', '1,000', '10,000', '50,000'] as $amount) {
            $this->assertStringContainsString(
                '<span class="cur">$</span><span class="val">'.$amount.'</span>',
                $html,
                $amount.' heading missing'
            );
        }
        $this->assertSame(4, substr_count($html, '>Minimum funding</div>'));
    }

    public function test_deposit_ranges_match_the_spec(): void
    {
        $html = $this->html();
        // min / max possible deposit for each tier
        foreach (['500', '999', '1,000', '9,999', '10,000', '49,999', '50,000', '100,000'] as $v) {
            $this->assertStringContainsString('<span class="v">$'.$v.'</span>', $html, $v.' missing');
        }
    }

    public function test_amounts_render_with_a_single_currency_symbol(): void
    {
        // Guards against a doubled "$" such as "$$500" in the tier headings.
        $this->assertStringNotContainsString('$$', $this->html());
    }

    public function test_returns_on_investment_are_correct(): void
    {
        $html = $this->html();
        foreach (['25%', '30%', '35%', '40%'] as $roi) {
            $this->assertStringContainsString('<span class="v hi">'.$roi.'</span>', $html);
        }
    }

    public function test_every_tier_has_the_shared_benefits(): void
    {
        $html = $this->html();
        // 4 tiers x 5% referral, 24 hour duration, instant deposit & withdrawal
        $this->assertSame(4, substr_count($html, '<span class="v gold">5%</span>'));
        $this->assertSame(4, substr_count($html, '<span class="v">24 hours</span>'));
        $this->assertSame(4, substr_count($html, 'Instant deposit &amp; withdrawal'));
    }

    public function test_plan_descriptions_are_present(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('Benefit from industry-leading entry prices', $html);
        $this->assertStringContainsString('Receive even tighter spreads and commissions', $html);
    }

    public function test_each_tier_has_an_open_account_cta(): void
    {
        $html = $this->html();
        $this->assertSame(4, substr_count($html, 'Open an Account'));
    }

    public function test_exactly_one_tier_is_featured(): void
    {
        $html = $this->html();
        $this->assertSame(1, substr_count($html, 'class="pr-card is-top"'));
        $this->assertSame(1, substr_count($html, 'class="pr-flag"'));
        $this->assertStringContainsString('Most popular', $html);
    }

    public function test_returns_are_presented_with_a_risk_disclaimer(): void
    {
        // A finance page quoting ROI figures needs to state they are not guaranteed.
        $html = $this->html();
        $this->assertStringContainsString('not guaranteed', $html);
        $this->assertStringContainsString('you can lose some or all of your deposited funds', $html);
    }

    public function test_pricing_grid_is_responsive(): void
    {
        $css = $this->pricingSource();
        $this->assertStringContainsString('.pr-grid{display:grid;grid-template-columns:repeat(4,1fr)', $css);
        // Four columns would overflow on tablets and phones.
        $this->assertStringContainsString('@media(max-width:1080px){.pr-grid{grid-template-columns:repeat(2,1fr)}}', $css);
        $this->assertStringContainsString('@media(max-width:620px){.pr-grid{grid-template-columns:1fr}}', $css);
    }

    public function test_cta_buttons_are_full_width_for_a_consistent_grid(): void
    {
        $this->assertStringContainsString('class="pv-btn pv-btn-block', $this->html());
    }

    /* ---------------- navbar ---------------- */

    public function test_navbar_shows_pricing_instead_of_home(): void
    {
        $nav = $this->navbar();
        $this->assertStringContainsString('>Pricing<', $nav);
        $this->assertStringNotContainsString('>Home<', $nav);
    }

    public function test_navbar_pricing_link_targets_the_page(): void
    {
        $this->assertStringContainsString(route('pricing'), $this->navbar());
    }

    public function test_home_is_still_reachable_via_the_logo(): void
    {
        // Removing the nav item must not make the landing page unreachable.
        $nav = $this->navbar();
        $this->assertStringContainsString('class="pv-logo"', $nav);
        $this->assertStringContainsString('href="'.url('/').'"', $nav);
    }

    public function test_pricing_route_is_named_and_reachable(): void
    {
        $this->assertSame(url('/pricing'), route('pricing'));
    }
}
