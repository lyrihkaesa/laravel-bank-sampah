<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = '$2y$10$LRwNfyUnjpOgX2o0vbvLiuM1oVTo9yx.MbHKoHWeazIc8bLEw9hNq'; // password
        // $password = Hash::make('password');

        User::create([
            'name' => 'Kaesa Lyrih',
            'phone' => '6281112223334',
            'role' => 'admin',
            'password' => $password,
            'total_balance' => 0,
            'total_organic_weight' => 0,
            'total_inorganic_weight' => 0,
            'total_waste_weight' => 0,
            'village' => 'Banyubiru',
            'rt' => '005',
            'rw' => '007',
            'email' => 'admin@gmail.com',
        ]);

        $this->call([
            WasteSeeder::class,
        ]);
    }
}
