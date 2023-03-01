<?php

namespace App\Actions;

use App\Contracts\ActionItemContracts;
use App\Models\ItemLayout;

final class SaveItemPost implements ActionItemContracts
{
    private $parameters;
    private $post;

    public function __construct($parameters, $post){
        $this->parameters = $parameters;
        $this->post = $post;
    }

    public function execute() : void
    {
        self::createItemLayoutImage();
        self::createItemLayoutTitle();
        self::createItemLayoutSubtitle();
        self::createItemLayoutContent();
    }

    private function createItemLayoutImage(): void
    {
        if(isset($this->parameters['image']) && !empty($this->parameters['image'])){
            $path = $this->parameters['image']->store('/post', 'public');
            $itemLayout = new ItemLayout();
            $itemLayout->content = $path;
            $itemLayout->type = 'image';
            $itemLayout->order = $this->parameters['image_order'];
            $itemLayout->post_id = $this->post;
            $itemLayout->save();
        }
    }

    private function createItemLayoutTitle(): void
    {
        if(isset($this->parameters['title']) && !empty($this->parameters['title'])){
            $itemLayout = new ItemLayout();
            $itemLayout->content = $this->parameters['title'];
            $itemLayout->type = 'title';
            $itemLayout->order = $this->parameters['title_order'];
            $itemLayout->post_id = $this->post;
            $itemLayout->save();
        }
    }

    private function createItemLayoutSubtitle(): void
    {
        if(isset($this->parameters['subtitle']) && !empty($this->parameters['subtitle'])){
            $itemLayout = new ItemLayout();
            $itemLayout->content = $this->parameters['subtitle'];
            $itemLayout->type = 'subtitle';
            $itemLayout->order = $this->parameters['subtitle_order'];
            $itemLayout->post_id = $this->post;
            $itemLayout->save();
        }
    }

    private function createItemLayoutContent(): void
    {
        if(isset($this->parameters['content']) && !empty($this->parameters['content'])){
            $itemLayout = new ItemLayout();
            $itemLayout->content = $this->parameters['content'];
            $itemLayout->type = 'description';
            $itemLayout->order = $this->parameters['content_order'];
            $itemLayout->post_id = $this->post;
            $itemLayout->save();
        }
    }
}
