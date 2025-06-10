<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['brand_name' => 'Coolmate', 'slug' => 'coolmate'],
            ['brand_name' => 'Levents', 'slug' => 'levents'],
            ['brand_name' => 'Routine', 'slug' => 'routine'],
            ['brand_name' => 'Hades Studio', 'slug' => 'hades-studio'],
        ];

        foreach ($brands as $brand) {
            \App\Models\Brand::create($brand);
        }
    }
}
