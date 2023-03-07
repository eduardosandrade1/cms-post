<?php

namespace App\Actions;

use App\Contracts\PostGetContract;
use App\Models\Post;

final class ActivePost implements PostGetContract
{
    public $idPost;

    public function __construct($idPost){
        $this->idPost = $idPost;
    }

    public function execute()
    {
        return Post::withTrashed()->find($this->idPost)->restore();
    }
}
