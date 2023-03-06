<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\PostForm;
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

        $this->assertAuthenticated();

        Livewire::test(PostForm::class)
            ->set('title', 'Titulo Teste')
            ->set('title_order', 1)
            ->set('subtitle', 'Subtitulo Teste')
            ->set('subtitle_order', 2)
            ->set('content', 'Corpo Teste')
            ->set('content_order', 3)
            ->call('create');

        $response = $this->get('admin/listar/posts');

        $response->assertStatus(200);
    }
}
