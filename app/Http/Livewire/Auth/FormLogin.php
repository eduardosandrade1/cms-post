<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormLogin extends Component
{

    public $email;

    public $password;

    public function render()
    {
        return view('livewire.auth.form-login')->layout('layouts.auth.app', [
            'title' => 'login',
        ]);
    }

    public function resetInputs()
    {
        $this->email = '';
        $this->password = '';
    }

    public function doLogin()
    {
        $this->validate([
            'email' => [
                'email',
                'required'
            ],
            'password' => [
                'required'
            ],
        ]);

        $attempt = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ( ! $attempt ) {

            $this->addError('incorrect-credentials', 'Login ou senha inválidos');

            $this->resetInputs();

            return;

        }

        return redirect()->route('home');

    }
}
