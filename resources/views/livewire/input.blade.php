<div class="input-group mb-3">
    @if ($type != 'file')
        <span for="{{$name}}" class="input-group-text" id="inputGroup-sizing-default">{{$label}}</span>
    @endif

    <input
        type="{{$type ?? 'text'}}"

        name="{{$name ? 'name='.$name : ''}}"

        {{$min ? 'minlength='.$min : ''}}

        {{$max ? 'maxlength='.$max : ''}}

        {{$placeholder ? 'placeholder='.$placeholder : ''}}

        {{$autofocus ? 'autofocus' : ''}}

        {{$disabled ? 'disabled' : ''}}

        {{$value ? 'value='.$value : ''}}

        {{$alt ? 'alt='.$alt : ''}}

        {{$readonly ? 'readonly' : ''}}


        class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

@if($errors->has($name))
    <div class="alert alert-danger" role="alert">
        {{$errors->first($name)}}
    </div>
@endif
