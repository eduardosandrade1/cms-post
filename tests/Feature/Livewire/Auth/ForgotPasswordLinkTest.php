<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Livewire\Auth\ForgotPasswordLink;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;
use Tests\TestCase;

class ForgotPasswordLinkTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $user = User::factory()->create([
            'email' => 'eduardo@gmail.com',
        ]);

        $token = Password::broker()->createToken($user);

        $component = Livewire::test(ForgotPasswordLink::class, [
            'token' => $token,
        ]);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_component_can_reset_password_with_successfull()
    {
        $user = User::factory()->create([
            'email' => 'eduardo@gmail.com',
        ]);

        $token = Password::broker()->createToken($user);

        $component = Livewire::test(ForgotPasswordLink::class, [
            'token' => $token,
        ]);

        $component->set('token', $token)
                    ->set('email', $user->email)
                    ->set('password', '123456789')
                    ->set('password_confirmation', '123456789')
                    ->call('saveNewPassword')
                    ->assertHasNoErrors();

    }

    /** @test */
    public function the_component_can_not_do_reset_password_with_invalids_data() : void
    {

        $user = User::factory()->create([
            'email' => 'eduardo@gmail.com',
        ]);

        $token = Password::broker()->createToken($user);

        $component = Livewire::test(ForgotPasswordLink::class, [
            'token' => $token
        ]);

        $component->set('email', 'invalid@mail.com')
                    ->set('password', '123456789')
                    ->set('password_confirmation', '123456789')
                    ->call('saveNewPassword')
                    ->assertHasErrors();

    }
}
