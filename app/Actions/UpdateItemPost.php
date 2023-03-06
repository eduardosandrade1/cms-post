<?php

namespace App\Actions;

use App\Contracts\ActionUpdateItemContracts;
use App\Models\ItemLayout;

final class UpdateItemPost implements ActionUpdateItemContracts
{
    private $parameters;

    public function __construct($parameters){
        $this->parameters = $parameters;
    }

    public function execute() : void
    {
        self::updateItemLayoutImage();
        self::updateItemLayoutTitle();
        self::upadateItemLayoutSubtitle();
        self::updateItemLayoutContent();
    }

    private function updateItemLayoutImage(): void
    {
        if(!empty($this->parameters['image'])){
            $path = $this->parameters['image']->store('/post', 'public');

            ItemLayout::where('id', $this->parameters['image_id'])->update([
                'content' => $path,
                'order' => $this->parameters['image_order'],
            ]);
        }
    }

    private function updateItemLayoutTitle(): void
    {
        ItemLayout::where('id', $this->parameters['title_id'])->update([
            'content' => $this->parameters['title'],
            'order' => $this->parameters['title_order'],
        ]);
    }

    private function upadateItemLayoutSubtitle(): void
    {
        ItemLayout::where('id', $this->parameters['subtitle_id'])->update([
            'content' => $this->parameters['subtitle'],
            'order' => $this->parameters['subtitle_order'],
        ]);
    }

    private function updateItemLayoutContent(): void
    {
        ItemLayout::where('id', $this->parameters['content_id'])->update([
            'content' => $this->parameters['content'],
            'order' => $this->parameters['content_order'],
        ]);
    }
}
