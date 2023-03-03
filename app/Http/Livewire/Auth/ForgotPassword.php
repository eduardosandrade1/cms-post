<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public $messageSuccess;

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.auth.app', [
            'title' => 'Forget password',
        ]);
    }

    private function clearInputs()
    {
        $this->email = '';
    }

    public function sendLinkResetPassword()
    {
        $this->validate([
            'email' => [
                'email',
                'required',
            ]
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );


        if ( $status === Password::RESET_LINK_SENT ) {
            $this->messageSuccess = "Link enviado para eu email com sucesso!";
            $this->clearInputs();
            return;
        }

        $this->addError('invalid-email', 'Email inválido!');
        return back()->with('success', 'link com Reset de senha enviado com sucesso!');


    }
}
