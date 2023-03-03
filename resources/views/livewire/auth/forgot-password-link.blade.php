<form wire:submit.prevent="saveNewPassword" class="p-5 mb-4 bg-light rounded-3">

    @if ($messageSuccess)
        <x-alert status="success" message="{{ $messageSuccess }}"></x-alert>
    @endif

    <h3 class="text-center">
        <strong>Reset your password!</strong>
    </h3>

    <p class="text-center">
        Please, enter bellow your credentials.
    </p>

    <div class="form-group">
        <x-input wire:model.lazy="email" label="Email Address" placeholder="Email" name="email" type="email"></x-input>
    </div>

    <div class="form-group">
        <x-input wire:model="password" label="Password" placeholder="Password" name="password" type="password"></x-input>
    </div>

    <div class="form-group">
        <x-input wire:model="password_confirmation" label="Password Confirm" placeholder="Password Confirm" name="password_confirmation" type="password"></x-input>
    </div>

    <div class="form-button mt-3">
        <x-button text="Submit" type="submit"></x-button>
    </div>
</form>
