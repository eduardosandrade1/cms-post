<form method="post" wire:submit.prevent="create">
    @livewire('input', ['name' => 'image', 'label' => 'Image', 'type' => 'file'])
    @livewire('input', ['name' => 'image_order', 'label' => 'Image order', 'type' => 'number', 'min' => 1, 'max' => 4])
    <br>

    @livewire('input', ['name' => 'title', 'label' => 'Title', 'type' => 'text'])
    @livewire('input', ['name' => 'title_order', 'label' => 'Title order', 'type' => 'number', 'min' => 1, 'max' => 4])
    <br>
    @livewire('input', ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text'])
    @livewire('input', ['name' => 'subtitle_order', 'label' => 'Subtitle order', 'type' => 'number', 'min' => 1, 'max' => 4])
    <br>

    @livewire('textarea', ['name' => 'content', 'label' => 'Content'])
    @livewire('input', ['name' => 'content_order', 'label' => 'Content order', 'type' => 'number', 'min' => 1, 'max' => 4])
    <br>

    @livewire('button', ['type' => 'submit', 'value' => 'Salvar'])
</form>
