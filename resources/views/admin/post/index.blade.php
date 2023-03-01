@extends('welcome')

@section('content')
    @livewire('post-form', ['typeSubmit' => 'create'])
    <br><br>
    <hr>
    <br><br>
@endsection
