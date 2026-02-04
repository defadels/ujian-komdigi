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

        // Carousel Seeding
        \App\Models\Carousel::updateOrCreate([
            'nama_carousel' => 'Transformasi Digital Kominfo',
        ], [
            'deskripsi' => 'Mewujudkan kedaulatan digital dan transformasi masyarakat yang adaptif di era teknologi informasi.',
            'gambar' => 'carousel/slide1.jpg', // Placeholder
            'status' => 'aktif',
        ]);

        \App\Models\Carousel::updateOrCreate([
            'nama_carousel' => 'Layanan Publik Terintegrasi',
        ], [
            'deskripsi' => 'Memberikan kemudahan akses layanan publik bagi seluruh lapisan masyarakat melalui portal satu pintu.',
            'gambar' => 'carousel/slide2.jpg', // Placeholder
            'status' => 'aktif',
        ]);
    }
}
