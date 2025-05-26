<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sipa.festival',
            'password' => bcrypt('password'), // Ganti dengan password yang diinginkan
        ]);

        // PANGGIL NEWS SEEDER DI SINI
        $this->call(NewsSeeder::class);
    }
}
