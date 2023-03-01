<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ForgotPassword extends Component
{
    public function render()
    {
        return view('livewire.forgot-password')->layout('layouts.auth.app', [
            'title' => 'Forget password',
        ]);
    }
}