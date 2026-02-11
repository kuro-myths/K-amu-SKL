<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kamu-skl.com'],
            [
                'name'     => 'Admin K-amu SKL',
                'email'    => 'admin@kamu-skl.com',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );
    }
}
