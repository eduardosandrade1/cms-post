<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-base font-semibold leading-6 text-gray-900">Quantidade de Post</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">{{count($posts)}}</p>
    </div>

    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Quantidade de likes por Post.</dt>
        </div>
        @foreach ($posts as $post)
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                @foreach ($post->itens as $item)
                    @if($item->type == 'title')
                        <dt class="text-sm font-medium text-gray-500">{{$item->content}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{count($post->likes)}}</dd>
                    @endif
                @endforeach
            </div>
        @endforeach
      </dl>
    </div>
</div>
