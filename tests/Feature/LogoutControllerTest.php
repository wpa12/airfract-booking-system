<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LogoutControllerTest extends TestCase
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

    public function test_logout_page_can_be_rendered(): void
    {
        $this->actingAs($this->user);
        $response = $this->post('/logout');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasNoErrors();
    }

    public function test_logout_button_can_be_seen_in_header(): void
    {
        $this->actingAs($this->user);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Log Out');
        $response->assertDontSee('Log In');
    }
}