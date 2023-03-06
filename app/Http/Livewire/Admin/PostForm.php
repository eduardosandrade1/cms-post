<?php

namespace App\Http\Livewire\Admin;

use App\Actions\GetPostItem;
use App\Actions\GetPostItens;
use App\Actions\SaveItemPost;
use App\Actions\SavePost;
use App\Actions\UpdateItemPost;
use App\Models\ItemLayout;
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
    public $image_id;
    public $title;
    public $title_order;
    public $title_id;
    public $subtitle;
    public $subtitle_order;
    public $subtitle_id;
    public $content;
    public $content_order;
    public $content_id;

    protected $rules = [
        'image' => 'nullable',
        'image_order' => 'nullable|numeric',
        'title' => 'required|string',
        'title_order' => 'required|numeric',
        'subtitle' => 'required|string',
        'subtitle_order' => 'required|numeric',
        'content' => 'required|string',
        'content_order' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.admin.post-form')->layout('layouts.admin.app', ['page' => 'register-post']);
    }

    public function create(){

        $this->validate();

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

    }
}
