<?php

namespace App\Actions\Web;

use App\Contracts\Web\PostItensContract;
use App\Models\Post;

final class GetPostItens implements PostItensContract
{

    public function execute()
    {
        return Post::orderByDesc('id')->with([
            'itens',
            'comments' => function ($builder) {
                $builder->with('user');
            },
            'likes' => function ($builder) {
                $builder->with('user');
            },
        ])->orderByDesc('order')->get();
    }
}
