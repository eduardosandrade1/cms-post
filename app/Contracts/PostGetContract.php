<?php

namespace App\Contracts;

use App\Models\Post;

interface PostGetContract
{
    public function __construct($idPost);

    public function execute();
}
