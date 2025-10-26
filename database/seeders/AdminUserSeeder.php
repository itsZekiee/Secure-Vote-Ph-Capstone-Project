<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Check if main admin already exists
        if (!User::where('email', 'raymondadmin@securevoteph.com')->exists()) {
            User::create([
                'name' => 'Main Admin',
                'email' => 'raymondadmin@securevoteph.com',
                'password' => Hash::make('pass1234'),
                'role' => 'main_admin',
                'is_verified' => true,
                'email_verified_at' => now(),
            ]);
        }
    }
}
