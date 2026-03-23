<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_superadmin_can_login_with_default_credentials(): void
    {
        // sanity checks to make sure the routes are registered correctly
        $getResp = $this->get('/login');
        if ($getResp->status() !== 200) {
            // dump content for debugging
            dump('GET /login content:');
            dump($getResp->getContent());
        }
        $getResp->assertStatus(200);

        $postCheck = $this->post('/login', []);
        // no credentials will trigger a validation error; route should exist
        $this->assertNotEquals(404, $postCheck->status(), 'POST /login route unexpectedly missing');

        // seed roles and superadmin so our default account exists
        $this->seed(\Database\Seeders\RolePermissionSeeder::class);

        $response = $this->post('/login', [
            'email' => 'superadmin@hrm.local',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard', false));
        $this->assertAuthenticated();
        $this->assertTrue(auth()->user()->hasRole('Super Admin'));
    }

    public function test_login_fails_with_wrong_password(): void
    {
        $this->seed(\Database\Seeders\RolePermissionSeeder::class);

        $response = $this->post('/login', [
            'email' => 'superadmin@hrm.local',
            'password' => 'wrong',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
