<div class="flex-row">
    @foreach ($posts as $post)
        @if ($post->itens->isNotEmpty())
            <div class="mt-5 mb-5 border rounded">
                <div class="text-end p-2 text-muted">
                    <small>
                        {{ $post->created_at->format('d/m/Y H:i:s') }}
                    </small>
                </div>
                <div class="post p-5">
                    @foreach ($post->itens as $item)
                        @if ($item->type == 'image')
                            <div
                                class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                <img src="{{ asset('storage/' . $item->content) }}" alt="{{ $item->type }}"
                                    class="pointer-events-none object-cover group-hover:opacity-75" style="height: 500px; max-width:50% ;">
                            </div>
                        @elseif ($item->type == 'title')
                            <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">
                                {{ $item->content }}
                            </p>
                        @elseif ($item->type == 'subtitle')
                            <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ $item->content }}</p>
                        @elseif ($item->type == 'description')
                            <p>{{ mb_strimwidth($item->content, 0, 100, '...') }}</p>
                        @endif
                    @endforeach
                </div>

                <div class="d-flex justify-content-evenly border-top">
                    <div class="form-group d-flex flex-column">

                        <x-button type="button" text="Curtir" wire:click="addLikePost({{ $post->id }})"></x-button>

                        <span class="text-muted">
                            @if (
                                $post->likes()->get()->contains('user_id', auth()->user()->id)
                            )
                                Você curtiu.
                            @endif

                            Total de {{ $post->likes()->count() }}
                            <small>
                                Curtida{{ 1 < $post->likes()->count() ? 's' : '' }}
                            </small>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="text-muted">
                            {{ $post->comments()->count() }}
                            <small>
                                Comments
                            </small>
                        </span>
                    </div>
                </div>

                <div class="comment-areas border-top">
                    <div class="form-group p-5">
                        <textarea name="contentComment" id="" class="form-control" cols="30" rows="5" wire:model.lazy="contentComment" required></textarea>
                        <div class="form-button text-end mt-3">
                            <x-button type="button" text="Add comment" wire:click="addCommentPost({{ $post->id }})"></x-button>
                        </div>
                    </div>

                    @if ($post->comments)
                        @foreach ($post->comments as $comment)
                            <x-comment name="{{ $comment->user()->first()->name }}" content="{{ $comment->content }}" time="{{ $comment->created_at ? $comment->created_at->format('d/m/Y H:i:s') : 'not_time' }}"></x-comment>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    @endforeach
</div>
