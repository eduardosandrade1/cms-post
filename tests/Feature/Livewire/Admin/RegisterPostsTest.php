<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\PostForm;
use App\Models\ItemLayout;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_render_register_post()
    {
        Livewire::actingAs(User::factory()->create());

        $this->assertAuthenticated();

        $response = $this->get('admin/registrar/post');

        $response->assertStatus(200);
    }

    public function test_register_post_authenticate()
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

            $this->assertTrue(ItemLayout::where('content', 'Titulo Teste')->exists());
            $this->assertTrue(ItemLayout::where('content', 'Subtitulo Teste')->exists());
            $this->assertTrue(ItemLayout::where('content', 'Corpo Teste')->exists());
    }

    public function test_register_post_no_authenticate()
    {
        $response = $this->get('admin/registrar/post');

        $response->assertStatus(302);

        $this->assertGuest();
    }
}
