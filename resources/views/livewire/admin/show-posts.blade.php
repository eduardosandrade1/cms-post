<ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
    @if (!empty($posts))
        @foreach ($posts as $post)
                @if ($post->itens->isNotEmpty())
                    <li class="relative p-2 " style="border: 1px solid gray; border-radius: 5%">
                        <a href="{{route('admin.list.post', ['idPost' => $post->id])}}">
                            @foreach ($post->itens as $item)
                                @if ($item->type == 'image')
                                    <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                        <img src="{{asset('storage/'.$item->content)}}" alt="{{$item->type}}" class="pointer-events-none object-cover group-hover:opacity-75">
                                    </div>
                                @elseif ($item->type == 'title')
                                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{$item->content}}</p>
                                @elseif ($item->type == 'subtitle')
                                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{$item->content}}</p>
                                @elseif ($item->type == 'description')
                                    <p>{{mb_strimwidth($item->content, 0, 200, "...")}}</p>
                                @endif
                            @endforeach
                        </a>

                        <br>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('admin.update.post', ['idPost' => $post->id])}}" class="btn btn-primary">Atualizar</a>
                            <button  wire:click="deactivate({{ $post->id }})" class="btn btn-danger">Desativar</button>
                        </div>
                    </li>

                @endif
        @endforeach
    @else
        <p>Nenhum post cadastrado.</p>
    @endif
</ul>
