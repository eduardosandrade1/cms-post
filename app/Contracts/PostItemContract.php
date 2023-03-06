<?php

namespace App\Contracts;

use App\Models\Post;

interface PostItemContract
{

    public function __construct(Post $Post, $id);

    public function execute();
}
