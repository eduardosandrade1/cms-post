<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class UserRegister extends Component
{

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public $successMessage;

    protected $rules = [
        'name' => [
            'required',
            'min:8',
            'max:100',
        ],
        'email' => [
            'email',
            'required',
        ],
        'password' => [
            'required',
            'min:8',
            'max:100',

        ]
    ];

    public function render()
    {
        return view('livewire.auth.user-register')->layout('layouts.auth.app', [
            'title' => 'Register User',
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function registerUser() : void
    {
        $this->validate();

        if ( User::where('email', $this->email)->exists() ) {
            $this->addError('exist-email', "Email já cadastrado na nossa base. Por favor, tente outro!");
            return;
        }

        $user = User::insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        if ( $user ) {
            $this->successMessage = "Usuário cadastrado com sucesso!";
            return;
        }

        $this->addError('generic-error', "Ocorreu um erro durante o cadastro do seu usuário. Por favor, tente mais tarde!");
        return;

    }
}
