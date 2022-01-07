<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->updateOrCreate(
            [
                'username' => 'admin'
            ],
            [
                'name' => 'Admin',
                'password' => 'admin12345'
            ]
        );

    }
}
