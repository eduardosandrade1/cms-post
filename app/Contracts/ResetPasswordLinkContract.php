<?php

namespace App\Contracts;

interface ResetPasswordLinkContract
{

    public function execute(string $email, string $password, string $password_confirmation, string $token);

}
