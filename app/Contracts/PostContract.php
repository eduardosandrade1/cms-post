<?php

namespace App\Contracts;

use App\Models\Post;

interface PostContract
{

    public function __construct($admin, Post $Post);

    public function execute();
}
