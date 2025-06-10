<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['brand_name' => 'Coolmate'],
            ['brand_name' => 'Levents'],
            ['brand_name' => 'Routine'],
            ['brand_name' => 'Hades Studio'],
        ];

        foreach ($brands as $brand) {
            \App\Models\Brand::create($brand);
        }
    }
}
