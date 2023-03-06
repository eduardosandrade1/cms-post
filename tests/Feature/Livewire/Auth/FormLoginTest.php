<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Livewire\Auth\FormLogin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormLoginTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(FormLogin::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_component_can_do_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'name' => 'Eduardo Andrade',
            'email' => 'eduardo@gmail.com',
        ]);

        $component = Livewire::test(FormLogin::class);

        $component->set('email', $user->email)
                    ->set('password', 'password')
                    ->call('doLogin')
                    ->assertRedirect(route('web.view-posts'));

    }

    /** @test */
    public function the_component_can_not_do_login_with_incorrect_type_email()
    {

        $component = Livewire::test(FormLogin::class);

        $component->set('email', 'invalidemail.com')
                    ->set('password', 'password')
                    ->call('doLogin')
                    ->assertHasErrors([
                        'email' => [
                            'email',
                        ]
                    ]);

    }

    /** @test */
    public function the_component_can_not_do_login_with_incorrect_password_or_incorrect_email()
    {

        // creating user to use email to test
        $user = User::factory()->create([
            'name' => 'Eduardo Andrade',
            'email' => 'eduardo@gmail.com',
            'password' => 'correctpassword'
        ]);

        $component = Livewire::test(FormLogin::class);

        $component->set('email', $user->email)
                    ->set('password', 'incorrectpassword')
                    ->call('doLogin')
                    ->assertHasErrors([
                        'incorrect-credentials'
                    ]);

        $component->set('email', $user->email)
                    ->set('password', 'incorrectpassword')
                    ->call('doLogin')
                    ->assertHasErrors([
                        'incorrect-credentials'
                    ]);



    }
}
