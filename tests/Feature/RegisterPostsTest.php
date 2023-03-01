<?php

namespace Tests\Feature;

use App\Http\Livewire\PostForm;
use App\Models\ItemLayout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_render_register_post()
    {
        $response = $this->get('/registrar/post');

        $response->assertStatus(200);
    }

    public function test_register_post()
    {
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
}
