<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Kaesa Lyrih',
            'phone' => '085738123456',
            'role' => 'admin',
            'password' => '$2y$10$LRwNfyUnjpOgX2o0vbvLiuM1oVTo9yx.MbHKoHWeazIc8bLEw9hNq', // password
            'avatar' => 'default.png',
            'balance' => '0',
            'total_organic_weight' => '0',
            'total_inorganic_weight' => '0',
            'total_waste_weight' => '0',
            'village' => 'Cibinong',
            'rt' => '01',
            'rw' => '01',
            'email' => 'admin@gmail.com',

        ]);
    }
}
