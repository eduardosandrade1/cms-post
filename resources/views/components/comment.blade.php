@props([
    'name',
    'content',
    'time'
])

<div class="form-group p-5">
    <div class="content border p-3">
        <div class="title-comment d-flex justify-content-between">
            <strong>
                {{ $name }}
            </strong>
            <small class="text-muted">
                {{ $time }}
            </small>
        </div>

        <p>
            {{ $content }}
        </p>
    </div>
</div>
