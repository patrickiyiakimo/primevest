<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThemeAndChartPresentationTest extends TestCase
{
    use RefreshDatabase;

    private function raw(string $view): string
    {
        return (string) file_get_contents(resource_path('views/'.$view));
    }

    private function welcome(): string
    {
        return $this->raw('welcome.blade.php');
    }

    private function trading(): string
    {
        return $this->raw('dashboard/stock-trading.blade.php');
    }

    private function appLayout(): string
    {
        return $this->raw('layouts/app.blade.php');
    }

    private function themePartial(): string
    {
        return $this->raw('partials/theme.blade.php');
    }

    /* ---------------- light theme navbar ---------------- */

    public function test_nav_links_do_not_hardcode_white_text(): void
    {
        // A literal #fff stays white on the light palette and vanishes against
        // the light nav, so emphasised nav text must resolve through --text.
        $css = $this->appLayout();
        $this->assertStringNotContainsString('.pv-nav-links a:hover,.pv-nav-links a.active{color:#fff}', $css);
        $this->assertStringContainsString('.pv-nav-links a:hover,.pv-nav-links a.active{color:var(--text)}', $css);
    }

    public function test_mobile_menu_panel_gets_a_light_theme_surface(): void
    {
        // The dropdown is dark navy by default; light-theme slate text on it was
        // unreadable, so the light theme needs its own panel background.
        $this->assertStringContainsString(
            '[data-theme="light"] .pv-nav-links{background:rgba(255,255,255,.97)',
            $this->themePartial()
        );
    }

    public function test_active_nav_item_is_styled_in_the_light_theme(): void
    {
        $css = $this->themePartial();
        $this->assertStringContainsString('[data-theme="light"] .pv-nav-links a.active{background:rgba(47,123,255,.13)', $css);
        $this->assertStringContainsString('[data-theme="light"] .pv-menu-ic{background:rgba(10,24,52,.04)}', $css);
    }

    public function test_dashboard_sidebar_light_override_survives_the_navbar_fix(): void
    {
        // Guard against a regression that dropped .side while editing nav rules.
        $this->assertStringContainsString('[data-theme="light"] .side', $this->themePartial());
    }

    /* ---------------- hero neon ---------------- */

    public function test_hero_renders_the_neon_light_layers(): void
    {
        $html = $this->welcome();
        $this->assertStringContainsString('<div class="hero-neon" aria-hidden="true">', $html);

        // Four drifting colour pools inside the neon layer (three blobs plus the
        // sweeping beam). Scoped to the div because the page has unrelated <i>.
        $start = strpos($html, '<div class="hero-neon"');
        $end = strpos($html, '</div>', $start);
        $this->assertNotFalse($start);
        $this->assertNotFalse($end);
        $this->assertSame(4, substr_count(substr($html, $start, $end - $start), '<i></i>'));
    }

    public function test_neon_light_animates(): void
    {
        $css = $this->welcome();
        foreach (['pvNeonA', 'pvNeonB', 'pvNeonC'] as $keyframe) {
            $this->assertStringContainsString('@keyframes '.$keyframe, $css);
        }
        $this->assertStringContainsString('animation:pvNeonA', $css);
    }

    public function test_neon_is_non_interactive_and_behind_the_copy(): void
    {
        $css = $this->welcome();
        // A full-bleed overlay must not swallow clicks on the hero CTAs.
        $this->assertStringContainsString('.hero-neon{position:absolute;inset:0;z-index:0;pointer-events:none', $css);
    }

    public function test_neon_respects_reduced_motion(): void
    {
        $css = $this->welcome();
        $this->assertStringContainsString('@media(prefers-reduced-motion:reduce)', $css);
        $this->assertMatchesRegularExpression(
            '/@media\(prefers-reduced-motion:reduce\)\{.*?\.hero-neon\{display:none\}.*?\}/s',
            $css
        );
    }

    public function test_neon_uses_multiply_in_the_light_theme(): void
    {
        // `screen` is invisible on white and `normal` at low alpha was too
        // faint, so light mode multiplies a stronger alpha to stay noticeable.
        $css = $this->welcome();
        $this->assertStringContainsString('[data-theme="light"] .hero-neon i{mix-blend-mode:multiply', $css);
        $this->assertStringContainsString('[data-theme="light"] .hero-neon{--a1:.5;--a2:.42;--a3:.24;--a4:.3}', $css);
        // Must not regress to the washed-out blend modes.
        $this->assertStringNotContainsString('[data-theme="light"] .hero-neon i{mix-blend-mode:normal', $css);
    }

    public function test_hero_lightning_has_been_removed(): void
    {
        $css = $this->welcome();
        // Reverted on request: ambient arcs and the sheet flash were dropped, the
        // neon stays.
        $this->assertStringNotContainsString('hero-storm', $css);
        $this->assertStringNotContainsString('hero-flash', $css);
        $this->assertStringNotContainsString('pvArc', $css);
        $this->assertStringNotContainsString('pvFlash', $css);
        $this->assertStringNotContainsString('hero-bolt', $css);
        $this->assertStringNotContainsString('arc-g', $css);
    }

    public function test_neon_survives_the_lightning_removal(): void
    {
        $html = $this->get('/')->assertOk()->getContent();
        // Three colour pools plus the sweeping beam, still animating.
        $this->assertStringContainsString('class="hero-neon"', $html);
        $this->assertStringContainsString('@keyframes pvNeonA', $html);
        $this->assertStringContainsString('@keyframes pvNeonB', $html);
        $this->assertStringContainsString('@keyframes pvNeonC', $html);
        $this->assertStringContainsString('@keyframes pvNeonD', $html);
        $start = strpos($html, '<div class="hero-neon"');
        $end = strpos($html, '</div>', $start);
        $this->assertSame(4, substr_count(substr($html, $start, $end - $start), '<i></i>'));
    }

    /* ---------------- trading chart ---------------- */

    public function test_trading_chart_is_taller_and_responsive(): void
    {
        $css = $this->trading();
        $this->assertStringNotContainsString('.chart-wrap{position:relative;height:320px}', $css);
        $this->assertStringContainsString('.chart-wrap{position:relative;height:clamp(420px,64vh,700px)}', $css);
        $this->assertStringContainsString('@media(max-width:640px){.chart-wrap{height:clamp(320px,54vh,430px)}}', $css);
    }

    public function test_trading_chart_palette_differs_by_theme(): void
    {
        // A single colour for both themes makes the toggle look like a no-op.
        $js = $this->trading();
        $this->assertStringContainsString("line: isL() ? '#2f7bff' : '#4cc3ff'", $js);
        $this->assertStringContainsString("grid: isL() ? 'rgba(10,24,52,.05)' : 'rgba(255,255,255,.045)'", $js);
    }

    public function test_trading_chart_rebuilds_when_the_theme_toggles(): void
    {
        $this->assertStringContainsString(
            "new MutationObserver(()=>{sparkAll();refreshChart(true);}).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']})",
            $this->trading()
        );
    }

    /* ---------------- top crypto live chart ---------------- */

    public function test_top_crypto_section_renders_a_live_chart(): void
    {
        $html = $this->trading();
        $this->assertStringContainsString('Top Crypto Assets', $html);
        $this->assertStringContainsString('id="cxChart"', $html);
        $this->assertStringContainsString('embed-widget-advanced-chart.js', $html);
        // The reference chart the user pointed at.
        $this->assertStringContainsString('BITSTAMP:BTCUSD', $html);
    }

    public function test_top_crypto_offers_several_top_assets(): void
    {
        $html = $this->trading();
        foreach (['BITSTAMP:BTCUSD', 'BITSTAMP:ETHUSD', 'BITSTAMP:SOLUSD', 'BINANCE:BNBUSDT'] as $symbol) {
            $this->assertStringContainsString('data-cx="'.$symbol.'"', $html);
        }
    }

    public function test_top_crypto_widget_follows_the_site_theme(): void
    {
        $js = $this->trading();
        $this->assertStringContainsString("colorTheme:isLight()?'light':'dark'", $js);
        $this->assertStringContainsString(
            "new MutationObserver(mount).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']})",
            $js
        );
    }

    public function test_top_crypto_uses_one_observer_and_one_mount_path(): void
    {
        $js = $this->trading();
        // pvThemedWidget creates a new observer per call, so re-calling it on each
        // tab switch would leak observers and let a stale one revert the symbol.
        $this->assertStringNotContainsString('pvThemedWidget', $js);
        $this->assertSame(1, substr_count($js, 'new MutationObserver(mount)'));
        $this->assertSame(1, substr_count($js, 'const mount='));
    }

    public function test_top_crypto_container_has_a_definite_height(): void
    {
        $this->assertStringContainsString(
            '.cx-box{position:relative;height:clamp(400px,52vh,560px)',
            $this->trading()
        );
    }

    public function test_live_badge_is_anchored_to_its_card(): void
    {
        // .pa has no positioning of its own, so the absolute badge needs it.
        $this->assertStringContainsString('class="pa mt" style="padding:18px;position:relative"', $this->trading());
    }

    /* ---------------- page still renders ---------------- */

    public function test_trading_page_still_renders_for_an_authenticated_user(): void
    {
        // The authenticated trade page is route('stock-trading'); route('trading')
        // is the separate public Markets page.
        $user = User::factory()->create();
        $res = $this->actingAs($user)->get(route('stock-trading'))->assertOk();

        // Assert against the real HTTP response body, not the source file, so
        // this fails if the served page is missing the new markup/CSS.
        $html = $res->getContent();
        $this->assertStringContainsString('Top Crypto Assets', $html);
        $this->assertStringContainsString('id="cxChart"', $html);
        $this->assertStringContainsString('BITSTAMP:BTCUSD', $html);
        $this->assertStringContainsString('.chart-wrap{position:relative;height:clamp(420px,64vh,700px)}', $html);
        $this->assertStringContainsString('#4cc3ff', $html);
    }

    /* ---------------- the public /trading page (route('trading')) ---------------- */

    public function test_public_trading_page_serves_a_taller_chart(): void
    {
        $html = $this->get(route('trading'))->assertOk()->getContent();
        $this->assertStringContainsString('height:clamp(480px,64vh,760px)', $html);
        $this->assertStringNotContainsString('height:430px', $html);
        // Height must collapse on phones.
        $this->assertStringContainsString('.pv-panel.tv-chart-panel{height:clamp(340px,52vh,460px)!important}', $html);
    }

    public function test_public_trading_chart_follows_the_site_theme(): void
    {
        $js = $this->publicTrading();
        // TradingView has no live theme setter, so the widget must be rebuilt.
        $this->assertStringContainsString("colorTheme:light?'light':'dark'", $js);
        $this->assertStringContainsString("gridColor:light?'rgba(10,24,52,.10)':'rgba(255,255,255,.06)'", $js);
        $this->assertStringContainsString('new MutationObserver', $js);
        $this->assertStringContainsString("attributeFilter:['data-theme']", $js);
    }

    public function test_public_trading_uses_the_real_advanced_chart_embed(): void
    {
        $js = $this->publicTrading();
        // The embed behind tradingview.com/chart/?symbol=BITSTAMP%3ABTCUSD.
        $this->assertStringContainsString('embed-widget-advanced-chart.js', $js);
        $this->assertStringContainsString("var symbol='BITSTAMP:BTCUSD'", $js);
        $this->assertStringContainsString('support_host', $js);
        // The legacy tv.js widget is gone.
        $this->assertStringNotContainsString('s3.tradingview.com/tv.js', $js);
        $this->assertStringNotContainsString('new TradingView.widget', $js);
    }

    public function test_public_trading_chart_rebuilds_from_a_clean_container(): void
    {
        $js = $this->publicTrading();
        // A stale container would leave the previous chart mounted underneath.
        $this->assertStringContainsString("host.innerHTML=''", $js);
        $this->assertStringContainsString('tradingview-widget-container', $js);
    }

    public function test_market_type_tabs_each_load_a_real_feed(): void
    {
        $html = $this->get(route('trading'))->assertOk()->getContent();
        foreach ([
            'spot' => 'BITSTAMP:BTCUSD',
            'futures' => 'BINANCE:BTCUSDT.P',
            'margin' => 'BINANCE:BTCUSDT',
            'staking' => 'BITSTAMP:ETHUSD',
        ] as $market => $symbol) {
            $this->assertStringContainsString('data-mv="'.$market.'"', $html);
            $this->assertStringContainsString('data-tv="'.$symbol.'"', $html);
        }
        // Real controls, not dead #spot anchors.
        $this->assertStringContainsString('role="tablist"', $html);
        $this->assertStringContainsString('aria-selected="true"', $html);
    }

    public function test_market_tabs_are_wired_to_the_widget(): void
    {
        $js = $this->publicTrading();
        $this->assertStringContainsString(".tv-market-tab", $js);
        $this->assertStringContainsString('t.getAttribute(\'data-tv\')', $js);
        $this->assertStringContainsString("x.setAttribute('aria-selected'", $js);
    }

    /* ---------------- copy trading moved to its own page ---------------- */

    public function test_copy_trading_is_no_longer_on_the_trading_page(): void
    {
        $html = $this->get(route('trading'))->assertOk()->getContent();
        $this->assertStringNotContainsString('Mirror the moves', $html);
        $this->assertStringNotContainsString('CryptoMatrix', $html);
        $this->assertStringNotContainsString('Copy trading in three simple steps', $html);
    }

    public function test_copy_trading_page_exists_and_holds_the_moved_content(): void
    {
        $html = $this->get(route('copy-trading'))->assertOk()->getContent();
        $this->assertStringContainsString("Mirror the moves of crypto's best traders", $html);
        $this->assertStringContainsString('CryptoMatrix', $html);
        $this->assertStringContainsString('Copy trading in three simple steps', $html);
        $this->assertStringContainsString('id="how-it-works"', $html);
    }

    public function test_copy_trading_link_points_at_the_page_not_an_anchor(): void
    {
        $navbar = $this->raw('layouts/navbar.blade.php');
        $this->assertStringContainsString("route('copy-trading')", $navbar);
        // The old link anchored to a section that no longer exists.
        $this->assertStringNotContainsString("route('trading') }}#copy-trading", $navbar);
    }

    public function test_trade_now_button_is_not_shown_to_signed_in_users_as_a_register_link(): void
    {
        $src = $this->publicTrading();
        $this->assertStringContainsString('@guest', $src);
        $this->assertStringContainsString('@endguest', $src);

        // Guests get the register CTA.
        $guest = $this->get(route('trading'))->assertOk()->getContent();
        $this->assertStringContainsString(route('register'), $guest);
        $this->assertStringContainsString('Trade Now', $guest);

        // A signed-in user must never be sent to /register from this CTA.
        $user = User::factory()->create();
        $authed = $this->actingAs($user)->get(route('trading'))->assertOk()->getContent();
        $start = strpos($authed, 'Trade Now');
        $this->assertNotFalse($start, 'authed users should still get a trade CTA');
        $chunk = substr($authed, max(0, $start - 400), 400);
        $this->assertStringNotContainsString(route('register'), $chunk);
        $this->assertStringContainsString(route('stock-trading'), $authed);
    }

    public function test_symbol_overview_widget_gets_a_numeric_height(): void
    {
        $js = $this->publicTrading();
        // This widget ignores percentage heights and has no autosize, so
        // height:'100%' rendered it at zero size inside an empty bordered box.
        $this->assertStringNotContainsString("height:'100%'", $js);
        $this->assertStringContainsString('height:assetsH', $js);
        $this->assertStringContainsString('Math.max(360,Math.round(', $js);
    }

    public function test_widgets_show_a_message_instead_of_an_empty_box(): void
    {
        $js = $this->publicTrading();
        $this->assertStringContainsString('function guard(el,h)', $js);
        $this->assertStringContainsString("el.querySelector('iframe')", $js);
        $this->assertStringContainsString('Live market data is temporarily unavailable.', $js);
        // The guard must re-arm on every remount, or it only ever fires once.
        $this->assertStringContainsString("el.dataset.guarded=''", $js);
        $this->assertStringContainsString("host.dataset.guarded=''", $js);
    }

    public function test_overview_widget_is_rebuilt_on_resize(): void
    {
        $js = $this->publicTrading();
        // Its pixel height is baked in, so a resize has to trigger a remount.
        $this->assertStringContainsString("window.addEventListener('resize'", $js);
        $this->assertStringContainsString('mountAssets()', $js);
    }

    public function test_top_crypto_prices_are_not_hardcoded(): void
    {
        $src = $this->publicTrading();
        // Every price used to be a literal in a $coins array, which meant the
        // page showed fabricated numbers next to a real chart.
        foreach ([
            '$coins',
            'tv-row',
            '24h High',
            '24h Low',
            '67241.80',
            '3482.15',
            '152.34',
            '0.1524',
            '584.90',
        ] as $needle) {
            $this->assertStringNotContainsString($needle, $src, $needle.' must not be hardcoded');
        }
    }

    public function test_top_crypto_uses_real_tradingview_data_widgets(): void
    {
        $js = $this->publicTrading();
        $this->assertStringContainsString('embed-widget-ticker-tape.js', $js);
        $this->assertStringContainsString('embed-widget-symbol-overview.js', $js);
        // The widget owns the numbers; our config supplies symbol metadata only.
        $this->assertStringContainsString("var ASSETS=[", $js);
        $this->assertStringContainsString("{s:'BITSTAMP:BTCUSD',d:'Bitcoin'}", $js);
        // No price/change/volume values may be sent to the widget or faked.
        // (Matched on the key, so `allow_symbol_change` doesn't false-positive.)
        $this->assertDoesNotMatchRegularExpression("/[{,]\s*'?price'?\s*:/", $js);
        $this->assertDoesNotMatchRegularExpression("/[{,]\s*'?volume'?\s*:/", $js);
        $this->assertDoesNotMatchRegularExpression("/[{,]\s*'?change'?\s*:/", $js);

        // Every ASSETS entry must carry only a symbol and a display name.
        preg_match_all("/\{s:'[^']+',d:'[^']+'\}/", $js, $m);
        $this->assertCount(8, $m[0], 'each asset should be exactly {s,d}');
    }

    public function test_asset_widgets_are_theme_aware(): void
    {
        $js = $this->publicTrading();
        $this->assertStringContainsString("var theme=light?'light':'dark'", $js);
        $this->assertStringContainsString("colorTheme:theme", $js);
        // Theme toggle must rebuild them along with the main chart.
        $this->assertStringContainsString('lastLight=isLight();mount();mountAssets();', $js);
    }

    public function test_top_crypto_section_serves_both_widget_mount_points(): void
    {
        $html = $this->get(route('trading'))->assertOk()->getContent();
        $this->assertStringContainsString('id="tvTape"', $html);
        $this->assertStringContainsString('id="tvAssets"', $html);
        $this->assertStringContainsString('Live prices &amp; charts streamed by TradingView', $html);
        $this->assertStringContainsString('Market data provided by TradingView', $html);
    }

    public function test_asset_symbols_cover_the_top_crypto_assets(): void
    {
        $js = $this->publicTrading();
        foreach ([
            'BITSTAMP:BTCUSD', 'BITSTAMP:ETHUSD', 'BITSTAMP:SOLUSD', 'BINANCE:BNBUSDT',
            'BITSTAMP:XRPUSD', 'BITSTAMP:ADAUSD', 'BITSTAMP:DOGEUSD', 'BITSTAMP:BCHUSD',
        ] as $symbol) {
            $this->assertStringContainsString("s:'".$symbol."'", $js);
        }
    }

    public function test_public_trading_defaults_to_the_bitstamp_btc_chart(): void
    {
        $js = $this->publicTrading();
        $this->assertStringContainsString("var symbol='BITSTAMP:BTCUSD'", $js);
    }

    private function publicTrading(): string
    {
        return $this->raw('pages/trading.blade.php');
    }

    /* ---------------- landing page, via GET / ---------------- */

    public function test_landing_page_response_contains_the_hero_neon(): void
    {
        // "/" is an unnamed closure route, so there is no route('welcome').
        $html = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('class="hero-neon"', $html);
        $this->assertStringContainsString('@keyframes pvNeonA', $html);
    }

    public function test_hero_neon_is_actually_visible_not_just_present(): void
    {
        // Regression guard: the first attempt used alpha .5 with blur(74px) at the
        // same coordinates as the existing .pv-hero::before gradients, so it
        // rendered but was indistinguishable from them.
        $html = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('--a1:.9', $html);
        $this->assertStringContainsString('filter:blur(20px)', $html);
        $this->assertStringContainsString('@keyframes pvNeonD', $html);
    }

    public function test_served_landing_navbar_uses_theme_aware_colours(): void
    {
        $html = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('.pv-nav-links a:hover,.pv-nav-links a.active{color:var(--text)}', $html);
        $this->assertStringContainsString('[data-theme="light"] .pv-nav-links{background:rgba(255,255,255,.97)', $html);
    }
}
