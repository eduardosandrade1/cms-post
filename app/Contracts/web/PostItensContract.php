<?php

namespace App\Contracts\Web;

use App\Models\Post;

interface PostItensContract
{

    public function execute(Post $Post);
}
