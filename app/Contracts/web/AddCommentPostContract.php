<?php

namespace App\Contracts\Web;

interface AddCommentPostContract
{

    public function execute(int $postId, int $userId, string $content);

}
