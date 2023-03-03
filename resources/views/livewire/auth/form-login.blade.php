<form wire:submit.prevent="doLogin" class="p-5 mb-4 bg-light rounded-3">
    @if ($errors->any())
        @foreach ($errors->all() as $errorMessage)
            <x-alert status="danger" message="{{$errorMessage}}" class="text-center"></x-alert>
        @endforeach
    @endif
    <div class="form-group">

        <x-input type="email" name="email" wire:model.lazy="email" id="email" autofocus placeholder="Email Address" label="Email address" value="{{ old('email') }}"></x-input>

    </div>

    <div class="form-group">

        <x-input type="password" name="password" wire:model.lazy="password" placeholder="password" label="password"></x-input>

    </div>


        <div class="form-group text-end">
            <a href="{{ route('forgot-password.create') }}">Forgot you password?</a>
        </div>

    <div class="mt-3 text-center">
        <x-button type="submit" text="Submit" disabled="true"></x-button>
    </div>

    <div class="form-group mt-3 text-center">
        Not a member? <a href="{{ route('register-user.create') }}">Register</a>
    </div>
</form>

