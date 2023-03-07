<?php

namespace App\Contracts\Admin;

interface RegisterUserAdminContract
{
    public function execute(string $name, string $email, string $password, string $type);

}
