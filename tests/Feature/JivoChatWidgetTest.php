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
}
