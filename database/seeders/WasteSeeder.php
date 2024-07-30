<?php

namespace Database\Seeders;

use App\Models\Waste;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wastes = [
            [
                'name' => 'Organic Apapun',
                'type' => 'organic',
                'price' => 5000,
            ],
            [
                'name' => 'Plastik',
                'type' => 'inorganic',
                'price' => 2000,
            ],
            [
                'name' => 'Kaca',
                'type' => 'inorganic',
                'price' => 3000,
            ],
            [
                'name' => 'Kaleng',
                'type' => 'inorganic',
                'price' => 2500,
            ],
        ];

        foreach ($wastes as $key => $waste) {
            Waste::create([
                'name' => $waste['name'],
                'type' => $waste['type'],
                'price' => $waste['price'],
            ]);
        }
    }
}
