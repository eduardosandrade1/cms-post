<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\GetAdmins;
use App\Actions\Admin\RegisterUserAdmin as AdminRegisterUserAdmin;
use App\Actions\Auth\RegisterUser;
use App\Actions\Auth\RegisterUserAdmin;
use App\Models\User;
use Livewire\Component;

class RegisterAdmin extends Component
{
    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public $erro = '';

    public $message = '';

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
        $users = (new GetAdmins())->execute();

        return view('livewire.admin.register-usuario', ['users' => $users])->layout('layouts.admin.app', ['page' => '']);
    }

    public function create(){
        $this->validate();

        $registerUser = (new AdminRegisterUserAdmin())->execute($this->name, $this->email, $this->password, 'admin');

        if (  RegisterUser::USER_EMAIL_EXIST_DATABASE === $registerUser ) {
            $this->message = '';
            $this->erro = "Email já cadastrado na nossa base. Por favor, tente outro!";
            return;
        }

        else if ( RegisterUser::USER_SUCCESS === $registerUser ) {
            $this->erro = '';
            $this->message = "Usuário cadastrado com sucesso!";
            return;
        }

        $this->message = '';
        $this->erro = "Ocorreu um erro durante o cadastro do seu usuário. Por favor, tente mais tarde!";
        return;
    }
}
