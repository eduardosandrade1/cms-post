@props(['name', 'type', 'label', 'placeholder', 'id' => $name])

<div class="input-group mb-3">
    @if ($type != 'file')
        <span for="{{$name}}" class="input-group-text" id="inputGroup-sizing-default">{{$label}}</span>
    @endif
    <input
        type="{{$type}}"

        name="{{$name}}"

        id="{{$id}}"

        placeholder={{$placeholder}}

        {{ $attributes->merge(['class' => 'form-control']) }}

        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
    />
    @error($name)<span class="error">{{ $message }}</span> @enderror
</div>
