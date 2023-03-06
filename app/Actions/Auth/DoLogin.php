<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;
use App\Contracts\LoginContract;

final class DoLogin implements LoginContract
{

    public function execute(string $email,string $password)
    {
        return Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }

}
