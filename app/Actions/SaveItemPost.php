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
        $itemLayout = new ItemLayout();
        $itemLayout->content = 'image';
        $itemLayout->type = 'image';
        $itemLayout->order = $this->parameters['image_order'];
        $itemLayout->post_id = $this->post;
        $itemLayout->save();
    }

    private function createItemLayoutTitle(): void
    {
        $itemLayout = new ItemLayout();
        $itemLayout->content = $this->parameters['title'];
        $itemLayout->type = 'title';
        $itemLayout->order = $this->parameters['title_order'];
        $itemLayout->post_id = $this->post;
        $itemLayout->save();
    }

    private function createItemLayoutSubtitle(): void
    {
        $itemLayout = new ItemLayout();
        $itemLayout->content = $this->parameters['subtitle'];
        $itemLayout->type = 'subtitle';
        $itemLayout->order = $this->parameters['subtitle_order'];
        $itemLayout->post_id = $this->post;
        $itemLayout->save();
    }

    private function createItemLayoutContent(): void
    {
        $itemLayout = new ItemLayout();
        $itemLayout->content = $this->parameters['content'];
        $itemLayout->type = 'description';
        $itemLayout->order = $this->parameters['content_order'];
        $itemLayout->post_id = $this->post;
        $itemLayout->save();
    }
}
