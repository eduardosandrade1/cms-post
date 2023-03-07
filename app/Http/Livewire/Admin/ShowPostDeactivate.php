<?php

namespace App\Http\Livewire\Admin;

use App\Actions\ActivePost;
use App\Actions\GetPostItemDeactivate;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPostDeactivate extends Component
{
    public $postDeactivate;

    public function render()
    {
        $this->postDeactivate = (new GetPostItemDeactivate(Auth::user()))->execute();

        return view('livewire.admin.show-post-deactivate')->layout('layouts.admin.app', ['page' => 'list-posts-deactivate']);
    }

    public function active($idPost)
    {
        (new ActivePost($idPost))->execute();
    }
}
