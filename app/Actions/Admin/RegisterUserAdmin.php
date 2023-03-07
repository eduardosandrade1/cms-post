<?php

namespace App\Actions\Auth;

use App\Contracts\RegisterUserAdminContract;
use App\Models\User;

final class RegisterUserAdmin implements RegisterUserAdminContract
{

    const USER_SUCCESS = 'user.saved';

    const USER_EMAIL_EXIST_DATABASE = 'user.email';


    public function execute(string $name, string $email, string $password, string $type)
    {
        if ( $this->existEmail($email) ) {
            return self::USER_EMAIL_EXIST_DATABASE;
        }

        $user = User::insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'password' => bcrypt($password),
        ]);

        if ( $user ) {
            return self::USER_SUCCESS;
        }
    }

    private function existEmail(string $email)
    {
        return User::where('email', $email)->exists();
    }

}
