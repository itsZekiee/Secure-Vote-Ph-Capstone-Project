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
            'name' => 'niel ezequiel',
            'email' => 'niel@securevoteph.com',
            'password' => Hash::make('pass1234'),
            'role' => 'main_admin',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);

        // Create test voter
        User::create([
            'name' => 'normal user',
            'email' => 'voter@securevoteph.com',
            'password' => Hash::make('pass1234'),
            'role' => 'voter',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);

        // Create test voter
        User::create([
            'name' => 'ejie boy',
            'email' => 'ejieboy@securevoteph.com',
            'password' => Hash::make('pass1234'),
            'role' => 'voter',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);

        $this->call(AdminUserSeeder::class);
    }
    
}
