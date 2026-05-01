<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        // create a user for testing
        $this->user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
    }

    public function test_dashboard_page_can_be_rendered(): void
    {
        $this->actingAs($this->user);
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_dashboard_cannot_be_accessed_by_unauthenticated_user(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasNoErrors();
    }
}