<?php

namespace App\Actions;

use App\Contracts\Web\PostItensContract;
use App\Models\Post;

final class GetPostItens implements PostItensContract
{

    public function execute(Post $post)
    {
        return $post::with('itens')->orderByDesc('order')->get();
    }
}
