<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@securevoteph.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);

        // Create test voter
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'voter@test.com',
            'password' => Hash::make('password'),
            'role' => 'voter',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);
    }
}
