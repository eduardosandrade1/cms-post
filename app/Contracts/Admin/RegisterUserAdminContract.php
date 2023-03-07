<?php

namespace App\Contracts;

interface RegisterUserAdminContract
{
    public function execute(string $name, string $email, string $password, string $type);

}
