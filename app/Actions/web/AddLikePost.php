<?php

namespace App\Actions\Web;

use App\Contracts\Web\AddLikePostContract;
use App\Models\Post;
use App\Models\PostUserLike;

final class addLikePost implements AddLikePostContract
{

    const POST_DOESNT_EXISTS = 'post-not-exists';

    public function execute(int $postId, int $userId)
    {
        if ( ! $this->verifyPostExist($postId) ) {
            return self::POST_DOESNT_EXISTS;
        }

        if ( $this->verifyLikeUserPostExists($userId, $postId) ) {
            #
            PostUserLike::where('user_id', $userId)->where('post_id', $postId)->forceDelete();

        } else {

            PostUserLike::insert([
                'post_id' => $postId,
                'user_id' => $userId,
            ]);
        }
    }

    private function verifyPostExist(int $postId)
    {
        return Post::where('id', $postId)->exists();
    }

    private function verifyLikeUserPostExists(int $idUser, int $postId)
    {
        return PostUserLike::where('user_id', $idUser)->where('post_id', $postId)->exists();
    }

}
