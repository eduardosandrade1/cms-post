<?php

namespace App\Http\Livewire;

use App\Actions\SaveItemPost;
use App\Actions\SavePost;
use App\Models\ItemLayout;
use App\Models\Post;
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
        'image' => 'required|file',
        'image_order' => 'required|numeric',
        'title' => 'required|string',
        'title_order' => 'required|numeric',
        'subtitle' => 'required|string',
        'subtitle_order' => 'required|numeric',
        'content' => 'required|string',
        'content_order' => 'required|numeric',
    ];

    public function render()
    {
        dd(Post::where('id', 1)->get()->itens);
        return view('livewire.post-form');
    }

    public function create(){

        $this->validate();

        $post = (new SavePost(1,new Post()))->execute();

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
