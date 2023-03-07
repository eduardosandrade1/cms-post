<?php

namespace App\Http\Livewire\Web;

use App\Actions\Web\GetPostItens;
use App\Models\Post;
use App\Models\PostUserComment;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostView extends Component
{
    /**
     * Contador de likes de cada post
     */
    public $countLikes;

    /**
     * Contador de comentário de cada post
     */
    public $countComments;

    public $comments;

    /**
     * Conteúdo do comentário
     */
    public $contentComment;


    private function refreshCountLikes(int $postId)
    {
        $this->countLikes[$postId] = PostUserLike::where('post_id', $postId)->count();
    }

    private function refreshCountComments(int $postId)
    {
        $this->countComments[$postId] = PostUserComment::where('post_id', $postId)->count();
    }

    public function render()
    {
        $posts = (new GetPostItens())->execute();

        return view('livewire.web.post-view', [
            'posts' => $posts,
        ]
        )->layout('layouts.web.app', [
            'title' => 'Posts'
        ]);
    }

    public function addLikePost(int $postId)
    {
        if ( ! Post::where('id', $postId)->exists() ) {
            $this->addError('post-not-exists', "O post ao qual tentou interagir pode ter sido removido. Atualize a página e tente novamente!");
            return;
        }

        if ( PostUserLike::where('user_id', auth()->user()->id)->where('post_id', $postId)->exists() ) {
            #
            PostUserLike::where('user_id', auth()->user()->id)->where('post_id', $postId)->forceDelete();
        } else {

            PostUserLike::insert([
                'post_id' => $postId,
                'user_id' => auth()->user()->id,
            ]);
        }

        $this->refreshCountLikes($postId);

    }

    public function addCommentPost(int $postId)
    {

        $postComment = new PostUserComment();
        $postComment->post_id = $postId;
        $postComment->user_id = Auth::user()->id;
        $postComment->content = $this->contentComment;
        $postComment->save();

        $this->refreshCountComments($postId);

    }

}
