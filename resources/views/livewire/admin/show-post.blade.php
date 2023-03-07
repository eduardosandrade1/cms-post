@foreach ($post->itens as $item)
    @if ($item->type == 'image')
        <div
            class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
            <img src="{{ asset('storage/' . $item->content) }}" alt="{{ $item->type }}"
                class="pointer-events-none object-cover group-hover:opacity-75">
        </div>
    @elseif ($item->type == 'title')
        <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{ $item->content }}</p>
    @elseif ($item->type == 'subtitle')
        <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ $item->content }}</p>
    @elseif ($item->type == 'description')
        <p>{{ $item->content}}</p>
    @endif
@endforeach
