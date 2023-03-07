<form wire:submit.prevent="update">
    @if ($register)
        <x-alert status="success" message="Post atualizado Com sucesso!" class="text-center"></x-alert>
    @endif
    <br><br><br>

    <x-input wire:model.lazy="image" name="image" type="file" placeholder="Imagem" label="Imagem"/>
    <x-input wire:model.lazy="image_order" name="image_order" type="number" placeholder="Ordem da imagem" label="Ordem da imagem" min="1" max="4"/>
    <x-input wire:model.lazy="image_id " name="image_id" type="number" placeholder="Ordem da imagem" style="display: none"/>

    <x-input wire:model.lazy="title" name="title" type="text" placeholder="Titulo" label="Titulo" />
    <x-input wire:model.lazy="title_order" name="title_order" type="number" placeholder="Ordem do titulo" label="Ordem do titulo" min="1" max="4"/>
    <x-input wire:model.lazy="title_id " name="title_id" type="number" placeholder="Ordem da imagem" style="display: none"/>


    <x-input wire:model.lazy="subtitle" name="subtitle" type="text" placeholder="Subtitulo" label="Subtitulo"/>
    <x-input wire:model.lazy="subtitle_order" name="subtitle_order" type="number" placeholder="Ordem do subtitulo" label="Ordem do subtitulo" min="1" max="4"/>
    <x-input wire:model.lazy="subtitle_id " name="subtitle_id" type="number" placeholder="Ordem da imagem" style="display: none"/>

    <x-input wire:model.lazy="content" name="content" type="text" placeholder="Corpo" label="Corpo" value="teste teste"/>
    <x-input wire:model.lazy="content_order" name="content_order" type="number" placeholder="Ordem do corpo" label="Ordem do corpo" min="1" max="4"/>
    <x-input wire:model.lazy="content_id " name="content_id" type="number" placeholder="Ordem da imagem" style="display: none"/>

    <x-button type="submit" text="Salvar" class="mb-2"></x-button>

    <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
        <li class="relative">
                @if ($image_order == 1)
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src="{{is_string($image) ? asset('storage/'.$image) : $image->temporaryUrl()}}" alt="img" class="pointer-events-none object-cover group-hover:opacity-75">
                    </div>
                @elseif ($title_order == 1)
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{$title}}</p>
                @elseif ($subtitle_order == 1)
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{$subtitle}}</p>
                @elseif ($content_order == 1)
                    <p>{{mb_strimwidth($content, 0, 200, "...")}}</p>
                @endif

                @if ($image_order == 2)
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src="{{is_string($image) ? asset('storage/'.$image) : $image->temporaryUrl()}}" alt="img" class="pointer-events-none object-cover group-hover:opacity-75">
                    </div>
                @elseif ($title_order == 2)
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{$title}}</p>
                @elseif ($subtitle_order == 2)
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{$subtitle}}</p>
                @elseif ($content_order == 2)
                    <p>{{mb_strimwidth($content, 0, 200, "...")}}</p>
                @endif

                @if ($image_order == 3)
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src="{{is_string($image) ? asset('storage/'.$image) : $image->temporaryUrl()}}" alt="img" class="pointer-events-none object-cover group-hover:opacity-75">
                    </div>
                @elseif ($title_order == 3)
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{$title}}</p>
                @elseif ($subtitle_order == 3)
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{$subtitle}}</p>
                @elseif ($content_order == 3)
                    <p>{{mb_strimwidth($content, 0, 200, "...")}}</p>
                @endif

                @if ($image_order == 4)
                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src="{{is_string($image) ? asset('storage/'.$image) : $image->temporaryUrl()}}" alt="img" class="pointer-events-none object-cover group-hover:opacity-75">
                    </div>
                @elseif ($title_order == 4)
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{$title}}</p>
                @elseif ($subtitle_order == 4)
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{$subtitle}}</p>
                @elseif ($content_order == 4)
                    <p>{{mb_strimwidth($content, 0, 200, "...")}}</p>
                @endif

        </li>
    </ul>
</form>




