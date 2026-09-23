<?php

namespace Tests\Feature\Frontend;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DynamicPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_page_is_rendered_by_slug(): void
    {
        $page = Page::create([
            'title' => 'Mission',
            'slug' => 'mission',
            'content' => '<p>Our mission statement.</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get('/mission');

        $response->assertOk();
        $response->assertSee('Mission');
        $response->assertSee('Our mission statement.');
    }

    public function test_draft_page_is_not_publicly_accessible(): void
    {
        Page::create([
            'title' => 'Draft',
            'slug' => 'draft-page',
            'content' => null,
            'status' => 'draft',
            'published_at' => null,
        ]);

        $this->get('/draft-page')->assertNotFound();
    }

    public function test_unknown_slug_returns_404(): void
    {
        $this->get('/no-such-page')->assertNotFound();
    }

    public function test_dynamic_slug_does_not_capture_admin_prefix(): void
    {
        $this->get('/access/anything-at-all')->assertNotFound();
        $this->get('/access')->assertNotFound();
    }

    public function test_dynamic_slug_does_not_capture_api_prefix(): void
    {
        $this->get('/api/v1/anything-at-all')->assertNotFound();
        $this->get('/api')->assertNotFound();
    }

    public function test_dynamic_slug_does_not_shadow_static_frontend_routes(): void
    {
        $this->get('/about')->assertOk();
        $this->get('/contact')->assertOk();
        $this->get('/')->assertOk();
    }
}