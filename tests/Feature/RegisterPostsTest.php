<?php

namespace Tests\Feature;

use App\Models\ItemLayout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterPostsTest extends TestCase
{

    public function test_render_register_post()
    {
        $response = $this->get('/registrar/post');

        $response->assertStatus(200);
    }

    public function test_register_post()
    {
        $response = $this->post('/registrar/post', [
            'image' => 'rotade/teste.jpg',
            'title_order' => 4,
            'title' => 'Teste Titulo',
            'title_order' => 1,
            'subtitle' => 'Teste Subtitulo',
            'subtitle_order' => 2,
            'content' => 'Teste Corpo',
            'content_order' => 3,
        ]);

        $response->assertStatus(200);
        $response->asserttEqual('Post registrado.');
        $response->assertViewHas('admin.index');

    }
}
