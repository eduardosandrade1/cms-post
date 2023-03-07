<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Auth\RegisterUser;
use App\Actions\Auth\RegisterUserAdmin;
use Livewire\Component;

class RegisterUsuarioAdmin extends Component
{
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
        return view('livewire.admin.register-usuario')->layout('layouts.admin.app', ['page' => '']);
    }

    public function create(){
        $this->validate();

        $registerUser = (new RegisterUserAdmin())->execute($this->name, $this->email, $this->password, 'admin');

        if (  RegisterUser::USER_EMAIL_EXIST_DATABASE === $registerUser ) {
            $this->addError('exist-email', "Email já cadastrado na nossa base. Por favor, tente outro!");
            return;
        }

        else if ( RegisterUser::USER_SUCCESS === $registerUser ) {
            $this->successMessage = "Usuário cadastrado com sucesso!";
            return;
        }

        $this->addError('generic-error', "Ocorreu um erro durante o cadastro do seu usuário. Por favor, tente mais tarde!");
        return;
    }
}
