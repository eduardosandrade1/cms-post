<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ForgotPassword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

        // check if route to render the component exist
        $this->get(route('forgot-password.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function the_component_can_reset_password_with_correct_email() : void
    {
        $user = User::factory()->create([
            'email' => 'eduardo@gmail.com',
        ]);

        $component = Livewire::test(ForgotPassword::class);

        $component->set('email', $user->email)
                    ->assertHasNoErrors()
                    ->assertSeeHtml('success');
    }

    // /** @test */
    // public function the_component_can_not_reset_password_with_incorrect_type_email() : void
    // {
    //     $component = Livewire::test(ForgotPassword::class);

    //     $component->set('email', )
    // }
}
