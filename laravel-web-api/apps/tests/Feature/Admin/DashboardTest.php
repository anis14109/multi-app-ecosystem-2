<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get('/access/dashboard')->assertRedirect(route('login'));
    }

    public function test_authenticated_and_verified_users_can_view_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/access/dashboard');

        $response->assertOk();
    }

    public function test_profile_page_requires_authentication(): void
    {
        $this->get('/access/profile')->assertRedirect(route('login'));
    }

    public function test_public_frontend_never_exposes_admin_controllers(): void
    {
        $this->get('/')->assertOk();
        $this->get('/dashboard')->assertNotFound();
    }
}