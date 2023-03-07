<?php

namespace App\Http\Livewire\Admin;

use App\Actions\GetLikePost;
use App\Actions\GetPostAll;
use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = (new GetPostAll())->execute();

        return view('livewire.admin.dashboard')->layout('layouts.admin.app', ['page' => 'dashboard']);
    }
}
