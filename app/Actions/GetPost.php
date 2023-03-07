<?php

namespace App\Actions;

use App\Contracts\PostGetContract;
use App\Models\Post;

final class GetPost implements PostGetContract
{
    public $idPost;

    public function __construct($idPost){
        $this->idPost = $idPost;
    }

    public function execute()
    {
        return Post::with('likes', 'itens')->where('id', $this->idPost)->first();
    }
}
