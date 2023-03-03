<?php

namespace App\Contracts;

use App\Models\Post;

interface PostItensContract
{

    public function __construct($admin, Post $Post);

    public function execute();
}
