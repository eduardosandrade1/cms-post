@extends('welcome')

@section('content')

<form method="POST" action="{{ route('login.store') }}">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      @livewire('input', ['type' => 'email', 'placeholder' => 'Enter email', 'name' => 'email'])

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>

      @livewire('input', ['type' => 'password',  'placeholder' => 'Password', 'name' => 'password'])

    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
