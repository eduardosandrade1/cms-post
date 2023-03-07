<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\ShowPostDeactivate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostDeactivateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowPostDeactivate::class);

        $component->assertStatus(200);
    }

    public function the_post_delete()
    {
        Livewire::actingAs(User::factory()->create());

        $this->assertAuthenticated();

        Livewire::test(PostForm::class)
            ->set('title', 'Titulo Teste')
            ->set('title_order', 1)
            ->set('subtitle', 'Subtitulo Teste')
            ->set('subtitle_order', 2)
            ->set('content', 'Corpo Teste')
            ->set('content_order', 3)
            ->call('create');

        Livewire::test(ShowPost::class)
            ->call('deactivate', 1);

        $this->assertNotEmpty(Post::withTrashed()->find(1));
    }

    public function the_post_active()
    {
        Livewire::actingAs(User::factory()->create());

        $this->assertAuthenticated();

        Livewire::test(PostForm::class)
            ->set('title', 'Titulo Teste')
            ->set('title_order', 1)
            ->set('subtitle', 'Subtitulo Teste')
            ->set('subtitle_order', 2)
            ->set('content', 'Corpo Teste')
            ->set('content_order', 3)
            ->call('create');

        Livewire::test(ShowPost::class)
            ->call('deactivate', 1);

        $this->assertNotEmpty(Post::withTrashed()->find(1));

        Livewire::test(ShowPostDeactivate::class)
            ->call('active', 1);

        $this->assertEmpty(Post::withTrashed()->find(1));
    }
}
