<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Role;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_admin_has_to_register_first()
    {
        $response = $this->post('/register', [
            'name' => 'Admin',
            'email' => rand(1,9999).'admin@example.com',
            'username' => rand(1,9999).'admin',
            'password' => 'password',
            'role' => Role::ROLE_ADMIN,
            'phone' => '100000765',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_customer_can_register_if_admin_exists()
    {
        $this->post('/register', [
            'name' => 'Admin',
            'email' => rand(1,9999).'admin@example.com',
            'username' => rand(1,9999).'admin',
            'password' => 'password',
            'role' => Role::ROLE_ADMIN,
            'phone' => '100000765',
        ]);

        $response = $this->post('/register', [
            'name' => 'Test Customer',
            'email' => rand(1,9999).'customer@example.com',
            'username' => rand(1,9999).'newcustomer',
            'password' => 'password',
            'role' => Role::ROLE_CUSTOMER,
            'phone' => '100000765',
        ]);
        
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_business_can_register_if_admin_exists()
    {
        $this->post('/register', [
            'name' => 'Admin',
            'email' => rand(1,9999).'admin@example.com',
            'username' => rand(1,9999).'admin',
            'password' => 'password',
            'role' => Role::ROLE_ADMIN,
            'phone' => '100000765',
        ]);
        
        $response = $this->post('/register', [
            'name' => 'Test Busines',
            'email' => rand(1,9999).'business@example.com',
            'username' => rand(1,9999).'newbusiness',
            'password' => 'password',
            'role' => Role::ROLE_BUSINESS,
            'phone' => '100000765',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}
