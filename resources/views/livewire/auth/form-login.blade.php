<form wire:submit.prevent="doLogin" class="p-5 mb-4 bg-light rounded-3">
    @csrf
    <div class="form-group">
        @if ($errors->any())
            @foreach ($errors->all() as $errorMessage)
                <x-alert status="danger" message="{{$errorMessage}}" class="text-center"></x-alert>
            @endforeach
        @endif

        <div class="form-input">
            <label class="form-label" for="email">Email address</label>

            <input type="email" name="email" wire:model="email" class="form-control" id="email" autofocus>
        </div>

    </div>
    <div class="form-group">

        <div class="form-input">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" class="form-control" wire:model="password" id="password">
        </div>

    </div>

    <div class="form-group">
        <a href="{{ route('forgot-password.create') }}">Forgot you password?</a>
    </div>

    <div class="mt-3">
        <x-button type="submit" text="Submit" disabled="true"></x-button>
    </div>

</form>

