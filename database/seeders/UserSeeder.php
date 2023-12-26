<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$X/kuyK9S4U6lV1r8khB9HOgQX34RNduFOuLn8uVQBBweHWvzfUuBa', // password: 1-9
            'remember_token' => Str::random(10),
            'isAdmin' => 1
        ]);
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$X/kuyK9S4U6lV1r8khB9HOgQX34RNduFOuLn8uVQBBweHWvzfUuBa', // password: 1-9
            'remember_token' => Str::random(10),
            'isAdmin' => 0
        ]);
    }
}
