<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\PostUserLike;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        PostUserLike::factory(56)->create();
    }
}
