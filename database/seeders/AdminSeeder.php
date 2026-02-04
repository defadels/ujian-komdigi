<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Administrator',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Regular User
        // User::updateOrCreate([
        //     'email' => 'user@user.com',
        // ], [
        //     'name' => 'Regular User',
        //     'password' => Hash::make('password'),
        //     'role' => 'user',
        // ]);

        // Create some random users
        // User::factory(10)->create();
    }
}
