<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'no_telp' => '081234567890',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'no_telp' => '082345678901',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user2',
                'email' => 'user2@example.com',
                'no_telp' => '083456789012',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        User::insert($users);
    }
}