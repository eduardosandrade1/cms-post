<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render() : void
    {
        $component = Livewire::test(ForgotPassword::class);

        $component->assertStatus(200);

    }

    /** @test */
    public function the_component_can_validate_email_and_send_link_to_user() : void
    {
        Notification::fake();

        $user = User::factory()->create([
            'email' => 'eduardo@gmail.com',
        ]);

        $component = Livewire::test(ForgotPassword::class);

        $component->set('email', $user->email)
                    ->call('sendLinkResetPassword')
                    ->assertHasNoErrors();

        Notification::assertSentTo($user, ResetPasswordNotification::class);

    }

    /** @test */
    public function the_component_can_not_reset_password_with_incorrect_email() : void
    {


        $component = Livewire::test(ForgotPassword::class);

        $component->set('email', 'invalid@mail.com')
                    ->call('sendLinkResetPassword')
                    ->assertHasErrors([
                        'invalid-email'
                    ]);
    }
}
