<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_do_logout()
    {
        $user = User::factory()->create();

        $this->actingAs(User::find($user->id));

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login.create'));
        $response->assertSessionHasNoErrors();
    }
}
