<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

class PostView extends Component
{
    public function render()
    {
        return view('livewire.web.post-view')->layout('layouts.web.app', [
            'title' => 'Posts'
        ]);
    }
}
