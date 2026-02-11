<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Ahmad Rizki',
                'email'    => 'ahmad.rizki@example.com',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ],
            [
                'name'     => 'Siti Nurhaliza',
                'email'    => 'siti.nurhaliza@example.com',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ],
            [
                'name'     => 'Budi Santoso',
                'email'    => 'budi.santoso@example.com',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ],
            [
                'name'     => 'Dewi Lestari',
                'email'    => 'dewi.lestari@example.com',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ],
            [
                'name'     => 'Rina Kartika',
                'email'    => 'rina.kartika@example.com',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
