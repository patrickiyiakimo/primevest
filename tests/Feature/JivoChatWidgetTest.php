<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JivoChatWidgetTest extends TestCase
{
    use RefreshDatabase;

    private const SNIPPET = 'code.jivosite.com/widget/tAEs2KagqM';

    private function countIn(string $html): int
    {
        return substr_count($html, self::SNIPPET);
    }

    public function test_partial_uses_explicit_https(): void
    {
        $partial = (string) file_get_contents(resource_path('views/partials/jivo.blade.php'));
        $this->assertStringContainsString('src="https://'.self::SNIPPET.'"', $partial);
        // a protocol-relative src would load insecurely on any http page
        $this->assertStringNotContainsString('src="//', $partial);
        $this->assertStringContainsString('async', $partial);
    }

    public function test_widget_loads_on_public_pages(): void
    {
        foreach (['/', '/trading', '/pricing', '/copy-trading'] as $url) {
            $html = $this->get($url)->assertOk()->getContent();
            $this->assertSame(1, $this->countIn($html), $url.' should load the widget once');
        }
    }

    public function test_widget_loads_on_guest_auth_pages(): void
    {
        foreach (['/login', '/register'] as $url) {
            $html = $this->get($url)->assertOk()->getContent();
            $this->assertSame(1, $this->countIn($html), $url.' should load the widget once');
        }
    }

    public function test_widget_loads_on_the_dashboard(): void
    {
        $user = User::factory()->create();
        $html = $this->actingAs($user)->get(route('dashboard'))->assertOk()->getContent();
        $this->assertSame(1, $this->countIn($html));
    }

    public function test_widget_is_not_duplicated_by_the_include(): void
    {
        // The script lives in one partial; each layout includes it exactly once.
        foreach (['app', 'dashboard', 'guest'] as $layout) {
            $blade = (string) file_get_contents(resource_path('views/layouts/'.$layout.'.blade.php'));
            $this->assertSame(
                1,
                substr_count($blade, "@include('partials.jivo')"),
                $layout.' should include the partial once'
            );
        }
    }

    public function test_widget_is_not_injected_into_the_admin_area(): void
    {
        // Staff-only area, kept free of the customer chat bubble.
        $blade = (string) file_get_contents(resource_path('views/layouts/admin.blade.php'));
        $this->assertStringNotContainsString('partials.jivo', $blade);
    }

    /* ---------------- programmatic open helper ---------------- */

    public function test_partial_exposes_a_programmatic_open_helper(): void
    {
        $partial = (string) file_get_contents(resource_path('views/partials/jivo.blade.php'));
        $this->assertStringContainsString('window.pvOpenChat=function(params)', $partial);
        $this->assertStringContainsString("a.open(params||{})", $partial);
    }

    public function test_helper_waits_for_the_api_to_load(): void
    {
        $partial = (string) file_get_contents(resource_path('views/partials/jivo.blade.php'));
        // jivo_api does not exist until Jivo's own script runs, so an immediate
        // call would be lost; the helper polls and then gives up.
        $this->assertStringContainsString('setInterval', $partial);
        $this->assertStringContainsString('clearInterval(t)', $partial);
        $this->assertStringContainsString('tries>50', $partial);
    }

    public function test_helper_accepts_either_api_casing(): void
    {
        $partial = (string) file_get_contents(resource_path('views/partials/jivo.blade.php'));
        $this->assertStringContainsString('window.jivo_api||window.Jivo_API', $partial);
    }

    public function test_helper_is_available_on_the_buy_crypto_page(): void
    {
        $user = User::factory()->create();
        $html = $this->actingAs($user)->get(route('buy-crypto'))->assertOk()->getContent();
        $this->assertStringContainsString('window.pvOpenChat=function', $html);
    }

    /* ---------------- buy crypto payment methods ---------------- */

    public function test_payment_method_click_opens_the_chat(): void
    {
        $user = User::factory()->create();
        $html = $this->actingAs($user)->get(route('buy-crypto'))->assertOk()->getContent();

        $this->assertStringContainsString("e.target.closest('.paym-item')", $html);
        $this->assertStringContainsString('window.pvOpenChat()', $html);
    }

    public function test_payment_method_click_does_not_block_the_radio_selection(): void
    {
        $user = User::factory()->create();
        $html = $this->actingAs($user)->get(route('buy-crypto'))->assertOk()->getContent();

        // Isolate just this handler. The layout has an unrelated preventDefault()
        // in the balance toggle, so a page-wide check would be meaningless.
        $this->assertSame(1, preg_match(
            '#const item=e\.target\.closest.*?pvOpenChat\(\);\s*\}\);#s',
            $html,
            $m
        ));
        $this->assertStringNotContainsString('preventDefault', $m[0]);
        $this->assertStringNotContainsString('return false', $m[0]);

        // the native radio is still there and still the first choice
        $this->assertStringContainsString('<input type="radio" name="payMethod"', $html);
        $this->assertStringContainsString('checked', $html);
    }

    public function test_every_payment_method_is_covered_by_the_delegated_handler(): void
    {
        $user = User::factory()->create();
        $html = $this->actingAs($user)->get(route('buy-crypto'))->assertOk()->getContent();

        // one delegated listener on the container covers every .paym-item
        $this->assertSame(5, substr_count($html, 'class="paym-item"'));
        $this->assertSame(1, substr_count($html, "closest('.paym-item')"));
    }
}
