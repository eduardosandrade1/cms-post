<?php

namespace App\Actions;

use App\Contracts\PostItemContract;
use App\Contracts\PostItensContract;
use App\Models\Post;

final class GetPostItem implements PostItemContract
{
    private $post;
    private $id;

    public function __construct($post, $id){
        $this->post = $post;
        $this->id = $id;
    }

    public function execute()
    {
        $post = $this->post::with('itens')->where('id', $this->id)->get();
        return $post[0];
    }
}
