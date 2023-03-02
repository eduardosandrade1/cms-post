<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Cadastrar Post</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <form wire:submit.prevent="create">

                    <x-input wire:model.lazy="image" name="image" type="file" placeholder="Imagem" label="Imagem"/>
                    <x-input wire:model.lazy="image_order" name="image_order" type="number" placeholder="Ordem da imagem" label="Ordem da imagem" min="1" max="4"/>

                    <x-input wire:model.lazy="title" name="title" type="text" placeholder="Titulo" label="Titulo"/>
                    <x-input wire:model.lazy="title_order" name="title_order" type="number" placeholder="Ordem do titulo" label="Ordem do titulo" min="1" max="4"/>

                    <x-input wire:model.lazy="subtitle" name="subtitle" type="text" placeholder="Subtitulo" label="Subtitulo"/>
                    <x-input wire:model.lazy="subtitle_order" name="subtitle_order" type="number" placeholder="Ordem do subtitulo" label="Ordem do subtitulo" min="1" max="4"/>

                    <x-input wire:model.lazy="content" name="content" type="text" placeholder="Corpo" label="Corpo"/>
                    <x-input wire:model.lazy="content_order" name="content_order" type="number" placeholder="Ordem do corpo" label="Ordem do corpo" min="1" max="4"/>

                    <x-button type="submit" text="Salvar"></x-button>
                </form>
            </div>
        </div>
    </div>
</div>