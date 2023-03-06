<?php

namespace App\Http\Livewire\Auth;

use App\Actions\Auth\ResetPasswordLink;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Livewire\Component;

class ForgotPasswordLink extends Component
{

    public $token;

    public $email;

    public $password;

    public $password_confirmation;

    public $messageSuccess;

    protected $rules = [
        'email' => [
            'email',
            'required',
        ],
        'password' => [
            'required',
            'confirmed',
            'min:8',
        ],
    ];

    public function mount($token)
    {
        $this->token = $token;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-link')->layout('layouts.auth.app', [
            'title' => 'Reset password'
        ]);
    }

    public function saveNewPassword()
    {

        $status = (new ResetPasswordLink())->execute($this->email, $this->password, $this->password_confirmation, $this->token);

        if ( $status === Password::PASSWORD_RESET ) {
            $this->messageSuccess = "Senha resetada com sucesso! Faça seu login com seus novos dados <a href='".route('login.create')."' >Aqui</a>";
            return;
        }

        $this->addError('fail-reset', 'Ocorreu um erro ao tentar trocar sua senha!');

    }
}
