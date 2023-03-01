<button
    type="{{ $type }}"

    {{ $attributes->merge([ 'class' => 'btn btn-secondary' ]) }} >

    {{ $text }}
</button>
