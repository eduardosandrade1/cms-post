<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\ShowPosts;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        Livewire::actingAs(User::factory()->create());

        $component = Livewire::test(ShowPosts::class);

        $component->assertStatus(200);
    }
}
