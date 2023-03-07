<?php

namespace App\Http\Livewire\Web;

use App\Actions\Web\GetPostItens;
use Livewire\Component;

class PostView extends Component
{
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


}
