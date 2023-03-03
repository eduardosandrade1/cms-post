<?php

namespace App\Contracts;

interface LoginContract
{
    public function execute(string $email, string $password);
}
