<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\RegisterUsuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterUsuarioTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(RegisterUsuario::class);

        $component->assertStatus(200);
    }
}
