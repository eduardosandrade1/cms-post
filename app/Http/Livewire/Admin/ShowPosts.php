<?php

namespace App\Http\Livewire\Admin;

use App\Actions\GetPostItens;
use App\Models\ItemLayout;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPosts extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = (new GetPostItens(Auth::user(), new Post()))->execute();

        return view('livewire.admin.show-posts')->layout('layouts.admin.app', ['page' => 'list-posts']);
    }
}
