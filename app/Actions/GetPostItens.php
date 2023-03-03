<?php

namespace App\Actions;

use App\Contracts\PostItensContract;

final class GetPostItens implements PostItensContract
{
    private $admin;
    private $post;

    public function __construct($admin, $post){
        $this->admin = $admin;
        $this->post = $post;
    }

    public function execute()
    {
        return $this->listPosts = $this->post::with('itens')->orderByDesc('order')->where('admin_id', $this->admin->id)->get();
    }
}
