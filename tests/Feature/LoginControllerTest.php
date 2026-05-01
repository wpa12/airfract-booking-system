<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LoginControllerTest extends TestCase
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
    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Log In to Aircraft Booking');
    }

    public function test_header_displays_logout_button_when_user_is_logged_in(): void
    {
        $this->actingAs($this->user);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Log Out');
        $response->assertDontSee('Log In');
    }

    // test to check that the login form can be submitted and redirects to dashboard
    public function test_login_form_can_be_submitted(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
            'remember' => false,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
        $response->assertSessionHasNoErrors();
    }

    // test to fail with invalid creds
    public function test_login_fails_with_invalid_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
            'remember' => false,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // a test to check that the session has errors when creds are empty
    public function test_login_fails_with_empty_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
            'remember' => false,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email' => 'The email field is required.']);
        $response->assertSessionHasErrors(['password' => 'The password field is required.']);
    }

    public function test_login_fails_with_invalid_email(): void
    {
        $response = $this->post('/login', [
            'email' => 'invalidemail',
            'password' => 'password',
            'remember' => false,
        ]);

        $response->assertStatus(302);
    }
}