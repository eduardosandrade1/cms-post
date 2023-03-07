<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\PostForm;
use App\Http\Livewire\Admin\UpdatePosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UpdatePostsTest extends TestCase
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

        $response = $this->get('admin/atualizar/post/1');

        $response->assertStatus(200);
    }

    public function test_update_post_authenticate()
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

        Livewire::test(UpdatePosts::class, ['idPost' => 1])
            ->set('title', 'Titulo Atualizado Teste')
            ->set('title_order', 1)
            ->set('subtitle', 'Subtitulo Atualizado Teste')
            ->set('subtitle_order', 2)
            ->set('content', 'Corpo Atualizado Teste')
            ->set('content_order', 3)
            ->call('update');
    }
}
