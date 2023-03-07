<?php

namespace App\Http\Livewire\Admin;

use App\Actions\GetPostItem;
use App\Actions\UpdateItemPost;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePosts extends Component
{
    use WithFileUploads;

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

    public $register = false;

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

    public function mount($idPost){
        $this->idPost = $idPost;
        self::createListValues();
    }

    public function render()
    {
        return view('livewire.admin.update-posts')->layout('layouts.admin.app', ['page' => 'register-post']);;
    }

    public function update()
    {
        $this->validate();

        (new UpdateItemPost([
            'image' => $this->image,
            'image_order' => $this->image_order,
            'image_id' => $this->image_id,
            'title' => $this->title,
            'title_order' => $this->title_order,
            'title_id' => $this->title_id,
            'subtitle' => $this->subtitle,
            'subtitle_order' => $this->subtitle_order,
            'subtitle_id' => $this->subtitle_id,
            'content' => $this->content,
            'content_order' => $this->content_order,
            'content_id' => $this->content_id,
        ]))->execute();

        self::clear();
        $this->register = true;
    }

    public function createListValues(){
        if(!empty($this->idPost)){
            $post = (new GetPostItem(new Post(), $this->idPost))->execute();

            foreach($post->itens as $item){

                if($item->type == 'image'){
                    $this->image = $item->content;
                    $this->image_order = $item->order;
                    $this->image_id = $item->id;
                }

                if($item->type == 'title'){
                    $this->title = $item->content;
                    $this->title_order = $item->order;
                    $this->title_id = $item->id;
                }

                if($item->type == 'subtitle'){
                    $this->subtitle = $item->content;
                    $this->subtitle_order = $item->order;
                    $this->subtitle_id = $item->id;
                }

                if($item->type == 'description'){
                    $this->content = $item->content;
                    $this->content_order = $item->order;
                    $this->content_id = $item->id;
                }
            }

        }
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
