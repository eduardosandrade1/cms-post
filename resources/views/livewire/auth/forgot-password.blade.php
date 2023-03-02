<form wire:submit.prevent="sendLinkResetPassword" class="p-5 mb-4 bg-light rounded-3">

    @if ($errors->any())
        @foreach ($errors->all() as $errorMessage)
            <x-alert status="danger" message="{{$errorMessage}}" class="text-center"></x-alert>
        @endforeach
    @endif

    <h3>
        <strong>Reset your password!</strong>
    </h3>

    <p>
        Please, enter bellow your email, we gonna send link to you do your reset.
    </p>

    <x-input type="email" wire:model.lazy="email" name="email" label="Email" placeholder="Email" autofocus></x-input>

    <div class="form-button mt-5">
        <x-button type="submit" text="Submit"></x-button>
    </div>

</form>
