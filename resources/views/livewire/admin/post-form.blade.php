<form wire:submit.prevent="create">
    <x-input wire:model.lazy="image" name="image" type="file" placeholder="Imagem" label="Imagem" value="{{$image ?? ''}}"/>
    <x-input wire:model.lazy="image_order" name="image_order" type="number" placeholder="Ordem da imagem" label="Ordem da imagem" min="1" max="4" value="{{$image_order ?? ''}}"/>

    <x-input wire:model.lazy="title" name="title" type="text" placeholder="Titulo" label="Titulo" value="{{$title ?? ''}}"/>
    <x-input wire:model.lazy="title_order" name="title_order" type="number" placeholder="Ordem do titulo" label="Ordem do titulo" min="1" max="4" value="{{$title_order ?? ''}}"/>

    <x-input wire:model.lazy="subtitle" name="subtitle" type="text" placeholder="Subtitulo" label="Subtitulo" value="{{$subtitle ?? ''}}"/>
    <x-input wire:model.lazy="subtitle_order" name="subtitle_order" type="number" placeholder="Ordem do subtitulo" label="Ordem do subtitulo" min="1" max="4" value="{{$subtitle_order ?? ''}}"/>

    <x-input wire:model.lazy="content" name="content" type="text" placeholder="Corpo" label="Corpo" value="{{$content ?? ''}}"/>
    <x-input wire:model.lazy="content_order" name="content_order" type="number" placeholder="Ordem do corpo" label="Ordem do corpo" min="1" max="4" value="{{$content_order ?? ''}}"/>

    <x-button type="submit" text="Salvar"></x-button>
</form>
