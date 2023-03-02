<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Livewire\Auth\ForgotPasswordLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ForgotPasswordLinkTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ForgotPasswordLink::class);

        $component->assertStatus(200);
    }
}
