<form wire:submit.prevent="create" class="p-5 mb-4 bg-light rounded-3">

    @if (!empty($this->message))
        <x-alert status="success" message="{{ $this->message }}"></x-alert>
    @endif

    @if (!empty($this->erro))
        <x-alert status="danger" message="{{ $this->erro }}"></x-alert>
    @endif
    <h3>
        <strong>Register</strong>
    </h3>

    <p>
        Register now and see our posts prety cool and be funny. XD
    </p>

    <div class="form-group">

        <x-input type="text" name="name" wire:model="name" label="name" placeholder="Name" ></x-input>

    </div>
    <div class="form-group">

        <x-input type="email" name="email" wire:model="email" label="email" placeholder="email" ></x-input>

    </div>
    <div class="form-group">

        <x-input type="password" name="password" wire:model="password" label="Password" placeholder="Password" ></x-input>

    </div>
    <div class="form-group">

        <x-input type="password" name="password_confirmation" wire:model="password_confirmation" label="Password Confirmation" placeholder="Password Confirmation" ></x-input>

    </div>

    <div class="form-btn mt-5 text-center">
        <x-button type="submit" text="Sumbit"></x-button>
    </div>
</form>


    <ul class="list-group">
        @foreach ($users as $user)
            <li class="list-group-item">{{$user->name}} - </li>
        @endforeach
    </ul>
