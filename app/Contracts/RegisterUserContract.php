<?php

namespace App\Contracts;

interface RegisterUserContract
{

    public function execute(string $name, string $email, string $password);

}
