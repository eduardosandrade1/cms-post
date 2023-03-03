@props([
    'status',
    'message',
])

@if ( ! empty($status) )

    <div {{ $attributes->merge([' class' => 'alert alert-'.$status ]) }} >
        {!! $message !!}
    </div>

@endif
