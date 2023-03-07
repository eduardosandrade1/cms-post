<?php

namespace App\Actions\Web;

use App\Contracts\Web\PostItensContract;
use App\Models\Post;

final class GetPostItens implements PostItensContract
{

    public function execute()
    {
        return Post::with('itens')->orderByDesc('order')->get();
    }
}
