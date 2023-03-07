<?php

namespace App\Http\Livewire\Admin;

use App\Actions\GetPost;
use Livewire\Component;

class ShowPost extends Component
{
    public $idPost;
    public $post;

    public function mount($idPost){
        $this->idPost = $idPost;
    }

    public function render()
    {
        $this->post = (new GetPost($this->idPost))->execute();

        return view('livewire.admin.show-post')->layout('layouts.admin.app', ['page' => '']);
    }
}
