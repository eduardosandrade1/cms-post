<?php

namespace App\Actions;

use App\Contracts\PostDeactivateContract;
use App\Contracts\PostItemContract;
use App\Models\Post;

final class GetPostItemDeactivate implements PostDeactivateContract
{
    public function execute()
    {
        return Post::with('itens')->onlyTrashed()->get();
    }
}
