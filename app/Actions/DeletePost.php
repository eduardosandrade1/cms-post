<?php

namespace App\Actions;

use App\Contracts\PostGetContract;
use App\Models\Post;

final class DeletePost implements PostGetContract
{
    public $idPost;

    public function __construct($idPost){
        $this->idPost = $idPost;
    }

    public function execute()
    {
        return Post::where('id', $this->idPost)->delete();
    }
}
