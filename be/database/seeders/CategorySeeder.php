<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Áo Nam', 'slug' => 'ao-nam', 'category_parent_id' => null],
            ['category_name' => 'Quần Nữ', 'slug' => 'quan-nu', 'category_parent_id' => null],
            ['category_name' => 'Giày Dép', 'slug' => 'giay-dep', 'category_parent_id' => null],
            ['category_name' => 'Phụ Kiện', 'slug' => 'phu-kien', 'category_parent_id' => null],
            ['category_name' => 'Đồ Nữ', 'slug' => 'do-nu', 'category_parent_id' => null],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
