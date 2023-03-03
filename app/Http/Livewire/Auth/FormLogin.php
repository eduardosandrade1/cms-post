<?php

namespace App\Http\Livewire\Auth;

use App\Actions\Auth\DoLogin;
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

        $attempt = (new DoLogin())->execute($this->email, $this->password);

        if ( ! $attempt ) {

            $this->addError('incorrect-credentials', 'Login ou senha inválidos');

            $this->resetInputs();

            return;

        }

        return redirect()->route('web.view-posts');

    }
}
