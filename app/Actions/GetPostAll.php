<?php

namespace App\Actions;

use App\Contracts\PostAllGetContract;
use App\Contracts\PostLikeContract;
use App\Models\Post;

final class GetPostAll implements PostAllGetContract
{
    public function execute()
    {
        $post = Post::with('likes', 'itens')->get();
        return $post;
    }
}
