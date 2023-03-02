<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\ShowPosts;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowPosts::class);

        $component->assertStatus(200);
    }

    // public function the_component_can_render()
    // {
    //     $component = Livewire::test(ShowPosts::class);

    //     $component->assertStatus(200);
    // }
}
