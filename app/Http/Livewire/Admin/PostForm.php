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

    public $typeSubmit;
    public $image;
    public $image_order;
    public $title;
    public $title_order;
    public $subtitle;
    public $subtitle_order;
    public $content;
    public $content_order;

    protected $rules = [
        'image' => 'nullable|file',
        'image_order' => 'nullable|numeric',
        'title' => 'nullable|string',
        'title_order' => 'nullable|numeric',
        'subtitle' => 'nullable|string',
        'subtitle_order' => 'nullable|numeric',
        'content' => 'nullable|string',
        'content_order' => 'nullable|numeric',
    ];

    public function render()
    {
        return view('livewire.admin.post-form')->layout('layouts.admin.app');
    }

    public function create(){

        $this->validate();

        $post = (new SavePost(Auth::user()->id,new Post()))->execute();

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

    public function update(){

        $this->validate();

        dd(
            $this->image,
            $this->image_order,
            $this->title,
            $this->title_order,
            $this->subtitle,
            $this->subtitle_order,
            $this->content,
            $this->content_order,
            'updated',
        );
    }
}
