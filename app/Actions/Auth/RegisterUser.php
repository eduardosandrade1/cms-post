<?php

namespace App\Actions\Auth;

use App\Contracts\RegisterUserContract;
use App\Models\User;

final class RegisterUser implements RegisterUserContract
{

    const USER_SUCCESS = 'user.saved';

    const USER_EMAIL_EXIST_DATABASE = 'user.email';



    public function execute(string $name, string $email, string $password)
    {
        if ( $this->existEmail($email) ) {
            return self::USER_EMAIL_EXIST_DATABASE;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->type = 'user';
        $user->save();

        if ( $user ) {
            return self::USER_SUCCESS;
        }
    }

    private function existEmail(string $email)
    {
        return User::where('email', $email)->exists();
    }

}
