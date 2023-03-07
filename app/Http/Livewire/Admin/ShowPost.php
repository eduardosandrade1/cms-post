<?php

namespace App\Http\Livewire\Admin;

use App\Actions\GetPost;
use Livewire\Component;

class ShowPost extends Component
{
    public $idPost;
    public $post;
    public $error;

    public function mount($idPost){
        $this->idPost = $idPost;
    }

    public function render()
    {
        $this->post = (new GetPost($this->idPost))->execute();

        if(!isset($this->post) && empty($this->post)){
            $this->error = true;
        }

        return view('livewire.admin.show-post')->layout('layouts.admin.app', ['page' => '']);
    }
}
