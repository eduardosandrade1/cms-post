<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_view_a_login_form() : void
    {
        $response = $this->get(route('login.create'));

        $response->assertStatus(200);
    }

    public function test_user_can_do_login_with_correct_credentials() : void
    {

        $user = User::factory()->create([
            'name' => 'Eduardo Andrade',
            'email' => 'eduardo@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);

    }

    public function test_user_can_not_do_login_with_incorrect_credentials() : void
    {
        $user = User::factory()->create([
            'name' => 'Eduardo Andrade',
            'email' => 'eduardo@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => 'incorrectmail@gmail.com',
            'password' => 'incorrectpassword',
        ]);

        $response->assertSessionHasErrors();
        $response->assertStatus(302);
    }

}
