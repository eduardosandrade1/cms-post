<?php

namespace App\Actions\Auth;

use App\Contracts\ResetPasswordLinkContract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

final class ResetPasswordLink implements ResetPasswordLinkContract
{

    public function execute(string $email, string $password, string $password_confirmation, string $token)
    {
        return Password::reset(
            [
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password_confirmation,
                'token' => $token
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
    }

}
