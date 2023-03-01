<?php

namespace App\Actions;

use App\Contracts\PostContract;
use App\Models\Post;

final class SavePost implements PostContract
{
    private $post;
    private $admin;

    public function __construct($admin, Post $post){
        $this->post = $post;
        $this->admin = $admin;
    }

    public function execute()
    {
        $this->post->admin_id = $this->admin;
        $this->post->save();
        return $this->post;
    }
}
