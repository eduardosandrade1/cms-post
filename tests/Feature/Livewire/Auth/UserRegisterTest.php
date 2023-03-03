<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Livewire\Auth\UserRegister;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test */
    public function the_component_can_render() : void
    {
        $component = Livewire::test(UserRegister::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_route_is_valid() : void
    {
        $this->get(route('register-user.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function the_component_can_register_user() : void
    {
        $name = $this->faker->name();
        $email = $this->faker->unique()->safeEmail;

        Livewire::test(UserRegister::class)
                ->set('name', $name)
                ->set('email', $email)
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('registerUser')
                ->assertHasNoErrors();

        $this->assertTrue(User::where('name', $name)->exists());
        $this->assertTrue(User::where('email', $email)->exists());
    }

    /** @test */
    public function the_component_can_not_register_user_with_incorrect_datas() : void
    {

        Livewire::test(UserRegister::class)
                ->set('name', 'CutName')
                ->set('email', 'incorectType.email')
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('registerUser')
                ->assertHasErrors([
                    'email' => [
                        'email'
                    ],
                    'name' => [
                        'min',
                    ]
                ]);
    }
}
