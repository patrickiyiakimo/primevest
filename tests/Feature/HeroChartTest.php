<?php

namespace Tests\Feature;

use Tests\TestCase;

class HeroChartTest extends TestCase
{
    private function html(): string
    {
        return $this->get('/')->assertOk()->getContent();
    }

    private function welcome(): string
    {
        return (string) file_get_contents(resource_path('views/welcome.blade.php'));
    }

    /* ---------------- fills the empty hero column ---------------- */

    public function test_hero_chart_card_is_present(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('hero-chart-card', $html);
        $this->assertStringContainsString('id="pvHeroChart"', $html);
    }

    /**
     * The hero chart's own script block. The page also embeds a screener lower
     * down that legitimately uses a percentage height.
     */
    private function heroScript(): string
    {
        $html = $this->html();
        preg_match_all('#<script>(.*?)</script>#s', $html, $m);
        foreach ($m[1] as $block) {
            if (str_contains($block, 'pvHeroChart')) {
                return $block;
            }
        }

        return '';
    }

    public function test_chart_sits_in_the_second_hero_column(): void
    {
        $html = $this->welcome();
        // The grid that was rendering an empty right-hand cell
        $this->assertStringContainsString('pv-grid pv-grid-2', $html);
        $this->assertStringContainsString('hero-chart-card', $html);
        // headline and chart are siblings inside that grid
        $this->assertSame(1, substr_count($html, 'class="hero-chart-card"'));
    }

    public function test_card_has_a_header_and_attribution(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('hero-chart-head', $html);
        $this->assertStringContainsString('BTC / USD', $html);
        $this->assertStringContainsString('hero-chart-live', $html);
        $this->assertStringContainsString('Market data by TradingView', $html);
    }

    /* ---------------- real data, not hardcoded ---------------- */

    public function test_chart_is_a_live_tradingview_embed(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('embed-widget-advanced-chart.js', $html);
        $this->assertStringContainsString('BITSTAMP:BTCUSD', $html);
        $this->assertStringContainsString('"autosize":true', $html);
    }

    public function test_chart_uses_autosize_rather_than_a_fixed_height(): void
    {
        $js = $this->heroScript();
        $this->assertNotSame('', $js, 'hero chart script not found');
        // the symbol-overview bug from the trading page: a percentage height
        // that collapsed the widget to zero inside a bordered box
        $this->assertStringNotContainsString('"height"', $js);
        // the advanced chart supports autosize, so the parent supplies the size
        $this->assertStringContainsString('"autosize":true', $js);
    }

    public function test_chart_is_theme_aware(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('"theme":t', $html);
        $this->assertStringContainsString('MutationObserver', $html);
        $this->assertStringContainsString("attributeFilter:['data-theme']", $html);
    }

    public function test_chart_falls_back_instead_of_showing_an_empty_card(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('function guard()', $html);
        $this->assertStringContainsString("host.querySelector('iframe')", $html);
        $this->assertStringContainsString('Live chart unavailable.', $html);
        // the guard must re-arm on a theme-driven remount
        $this->assertStringContainsString("host.dataset.guarded=''", $html);
    }

    public function test_card_keeps_its_shape_while_loading(): void
    {
        $html = $this->html();
        $this->assertStringContainsString('Loading live market', $html);
    }

    /* ---------------- blends into the hero ---------------- */

    public function test_chart_has_no_card_chrome(): void
    {
        $block = $this->chartCss();
        // An opaque panel, border or drop shadow is what made it read as a
        // separate widget sitting on the hero.
        $this->assertStringNotContainsString('border:1px solid var(--line)', $block);
        $this->assertStringNotContainsString('background:var(--panel)', $block);
        $this->assertStringNotContainsString('box-shadow:0 30px 70px', $block);
        $this->assertStringNotContainsString('overflow:hidden', $block);
        $this->assertStringContainsString('.hero-chart-card{position:relative;display:flex;flex-direction:column}', $block);
    }

    public function test_header_and_footer_lose_their_dividers(): void
    {
        $block = $this->chartCss();
        $this->assertStringNotContainsString('.hero-chart-head{display:flex;align-items:center;gap:10px;padding:13px 16px;border-bottom', $block);
        $this->assertStringNotContainsString('border-top:1px solid var(--line)', $block);
        $this->assertStringNotContainsString('border-bottom:1px solid var(--line)', $block);
    }

    public function test_chart_edges_are_masked_into_the_hero(): void
    {
        $block = $this->chartCss();
        $this->assertStringContainsString('-webkit-mask-image:radial-gradient(122% 112% at 50% 50%', $block);
        $this->assertStringContainsString('mask-image:radial-gradient(122% 112% at 50% 50%', $block);
    }

    public function test_chart_sits_on_a_soft_glow_rather_than_a_box(): void
    {
        $block = $this->chartCss();
        $this->assertStringContainsString('.hero-chart-card::before', $block);
        $this->assertStringContainsString('radial-gradient(58% 58% at 54% 46%,rgba(47,123,255,.22)', $block);
    }

    public function test_live_pill_is_no_longer_a_boxed_badge(): void
    {
        $block = $this->chartCss();
        // it was a bordered pill; now just a quiet label
        $this->assertStringNotContainsString('.hero-chart-live{margin-left:auto', $block);
        $this->assertStringContainsString('.hero-chart-live{font-size:.58rem', $block);
    }

    /* ---------------- mobile ---------------- */

    /** The hero chart's CSS block, isolated from the rest of the page styles. */
    private function chartCss(): string
    {
        $css = $this->welcome();
        $start = strpos($css, '/* ---- hero live chart ----');
        $end = strpos($css, '/* ---- awards strip ---- */');
        $this->assertNotFalse($start);
        $this->assertNotFalse($end);

        return substr($css, $start, $end - $start);
    }

    public function test_chart_height_is_reduced_on_phones(): void
    {
        $css = $this->chartCss();
        $this->assertStringContainsString('.hero-chart{position:relative;z-index:1;height:clamp(280px,36vh,392px)', $css);
        $this->assertStringContainsString('@media(max-width:900px){', $css);
        $this->assertStringContainsString('height:clamp(210px,30vh,300px)', $css);
    }

    public function test_chart_is_not_hidden_on_mobile(): void
    {
        $css = $this->chartCss();
        // it stacks under the copy rather than disappearing
        $this->assertStringNotContainsString('.hero-chart-card{display:none}', $css);
        $this->assertStringNotContainsString('.hero-chart{display:none}', $css);
    }

    public function test_light_theme_glow_is_defined(): void
    {
        $this->assertStringContainsString(
            '[data-theme="light"] .hero-chart-card::before',
            $this->chartCss()
        );
    }
}
