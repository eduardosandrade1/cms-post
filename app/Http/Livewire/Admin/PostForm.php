<?php

namespace App\Http\Livewire\Admin;

use App\Actions\SaveItemPost;
use App\Actions\SavePost;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostForm extends Component
{
    use WithFileUploads;

    public $method;
    public $idPost;
    public $typeSubmit;
    public $image;
    public $image_order;
    public $title;
    public $title_order;
    public $subtitle;
    public $subtitle_order;
    public $content;
    public $content_order;
    public $register = false;

    public function render()
    {
        return view('livewire.admin.post-form')->layout('layouts.admin.app', ['page' => 'register-post']);
    }

    public function create(){

        $this->validate([
            'image' => ['nullable'],
            'image_order' => ['nullable', 'integer'],
            'title' => ['required', 'string'],
            'title_order' => ['required', 'integer'],
            'subtitle' => ['required', 'string'],
            'subtitle_order' => ['required', 'integer'],
            'content' => ['required', 'string'],
            'content_order' => ['required', 'integer'],
        ]);

        $post = (new SavePost(Auth::user()->id, new Post()))->execute();

        (new SaveItemPost([
            'image' => $this->image,
            'image_order' => $this->image_order,
            'title' => $this->title,
            'title_order' => $this->title_order,
            'subtitle' => $this->subtitle,
            'subtitle_order' => $this->subtitle_order,
            'content' => $this->content,
            'content_order' => $this->content_order,
        ],
        $post->id
        ))->execute();

        self::clear();
        $this->register = true;
    }

    public function clear(){
        $this->image = '';
        $this->image_order = '';
        $this->title = '';
        $this->title_order = '';
        $this->subtitle = '';
        $this->subtitle_order = '';
        $this->content = '';
        $this->content_order = '';
    }
}
