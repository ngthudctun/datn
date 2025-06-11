<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Áo Thun Nam Cotton',
                'image' => 'storage/products/ao-thun-nam.jpg',
                'description' => 'Áo thun nam chất liệu cotton thoáng mát, co giãn tốt.',
                'short_description' => 'Áo thun nam đơn giản, dễ phối đồ.',
                'slug' => 'ao-thun-nam-cotton',
                'status' => true,
                'category_id' => 1,
                'brand_id' => 1,
            ],
            [
                'product_name' => 'Quần Jean Nữ Co Giãn',
                'image' => 'storage/products/quan-jean-nu.jpg',
                'description' => 'Quần jean nữ lưng cao, co giãn tốt, tôn dáng.',
                'short_description' => 'Jean nữ co giãn nhẹ, form ôm.',
                'slug' => 'quan-jean-nu-co-gian',
                'status' => true,
                'category_id' => 2,
                'brand_id' => 2,
            ],
            [
                'product_name' => 'Giày Sneaker Trắng',
                'image' => 'storage/products/giay-sneaker-trang.jpg',
                'description' => 'Sneaker màu trắng, phong cách basic, dễ phối đồ.',
                'short_description' => 'Giày sneaker màu trắng thời trang.',
                'slug' => 'giay-sneaker-trang',
                'status' => true,
                'category_id' => 3,
                'brand_id' => 1,
            ],
            [
                'product_name' => 'Túi Xách Nữ Da PU',
                'image' => 'storage/products/tui-xach-nu.jpg',
                'description' => 'Túi xách nữ thời trang bằng da PU, nhiều màu.',
                'short_description' => 'Túi xách nhỏ gọn, thời trang.',
                'slug' => 'tui-xach-nu-da-pu',
                'status' => true,
                'category_id' => 4,
                'brand_id' => 3,
            ],
            [
                'product_name' => 'Mũ Bucket Vải Dù',
                'image' => 'storage/products/mu-bucket.jpg',
                'description' => 'Mũ bucket unisex, chống nắng, thời trang.',
                'short_description' => 'Mũ bucket phong cách Hàn Quốc.',
                'slug' => 'mu-bucket-vai-du',
                'status' => true,
                'category_id' => 5,
                'brand_id' => 4,
            ],
            [
                'product_name' => 'Áo Khoác Hoodie Nam',
                'image' => 'storage/products/hoodie-nam.jpg',
                'description' => 'Hoodie chất liệu nỉ bông, giữ ấm, phong cách streetwear.',
                'short_description' => 'Áo hoodie nam dày dặn, có mũ.',
                'slug' => 'ao-khoac-hoodie-nam',
                'status' => true,
                'category_id' => 1,
                'brand_id' => 2,
            ],
            [
                'product_name' => 'Váy Hoa Nhí Dáng Dài',
                'image' => 'storage/products/vay-hoa-nhi.jpg',
                'description' => 'Váy dài họa tiết hoa nhí, nữ tính, dễ thương.',
                'short_description' => 'Váy dài kiểu vintage nữ tính.',
                'slug' => 'vay-hoa-nhi-dang-dai',
                'status' => true,
                'category_id' => 2,
                'brand_id' => 3,
            ],
            [
                'product_name' => 'Dép Quai Ngang Nam',
                'image' => 'storage/products/dep-quai-ngang.jpg',
                'description' => 'Dép nam quai ngang, đế êm, chống trượt.',
                'short_description' => 'Dép tiện lợi, đi chơi, đi biển.',
                'slug' => 'dep-quai-ngang-nam',
                'status' => true,
                'category_id' => 3,
                'brand_id' => 4,
            ],
            [
                'product_name' => 'Balo Laptop 15 inch',
                'image' => 'storage/products/balo-laptop.jpg',
                'description' => 'Balo thời trang chống nước, đựng laptop 15 inch.',
                'short_description' => 'Balo công sở gọn nhẹ, tiện lợi.',
                'slug' => 'balo-laptop-15-inch',
                'status' => true,
                'category_id' => 4,
                'brand_id' => 1,
            ],
            [
                'product_name' => 'Thắt Lưng Nam Da Bò',
                'image' => 'storage/products/that-lung-da-bo.jpg',
                'description' => 'Thắt lưng nam da bò thật, khoá kim loại bền chắc.',
                'short_description' => 'Thắt lưng nam cao cấp.',
                'slug' => 'that-lung-nam-da-bo',
                'status' => true,
                'category_id' => 5,
                'brand_id' => 2,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
