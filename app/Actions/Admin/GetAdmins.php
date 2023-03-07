<?php

namespace App\Actions\Admin;

use App\Models\User;

final class GetAdmins
{
    public function execute()
    {
        return User::where('type', 'admin')->get();
    }
}
