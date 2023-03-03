<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PostView;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PostView::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_component_has_one_route_to_render()
    {
        Livewire::actingAs(User::factory()->create());

        $this->assertAuthenticated();

        $this->get(route('web.view-posts'))
            ->assertStatus(200);
    }
}
