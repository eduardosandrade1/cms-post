<?php

namespace App\Actions\Web;

use App\Contracts\Web\AddCommentPostContract;
use App\Models\PostUserComment;

final class AddCommentPost implements AddCommentPostContract
{

    public function execute(int $postId, int $userId, string $content)
    {
        $postComment = new PostUserComment();
        $postComment->post_id = $postId;
        $postComment->user_id = $userId;
        $postComment->content = $content;
        $postComment->save();
    }

}
