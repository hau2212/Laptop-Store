<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'ASUS TUF Gaming F15',
                'slug' => Str::slug('ASUS TUF Gaming F15'),
                'description' => 'Laptop gaming mạnh mẽ với CPU Intel i7 Gen 12 và GPU RTX 4060.',
                'price' => 28000000,
                'discount_price' => 26500000,
                'stock' => 15,
                'category_id' => 1, // tham chiếu đến bảng categories
                'image' => 'products/asus_tuf_f15.jpg',
                'gallery' => json_encode([
                    'products/asus_tuf_f15_1.jpg',
                    'products/asus_tuf_f15_2.jpg',
                    'products/asus_tuf_f15_3.jpg',
                ]),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MacBook Air M2',
                'slug' => Str::slug('MacBook Air M2'),
                'description' => 'Thiết kế mỏng nhẹ, chip Apple M2, hiệu năng vượt trội cho công việc văn phòng.',
                'price' => 32000000,
                'discount_price' => null,
                'stock' => 10,
                'category_id' => 2,
                'image' => 'products/macbook_air_m2.jpg',
                'gallery' => json_encode([
                    'products/macbook_air_m2_1.jpg',
                    'products/macbook_air_m2_2.jpg',
                ]),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Acer Nitro 5 AN515',
                'slug' => Str::slug('Acer Nitro 5 AN515'),
                'description' => 'Laptop gaming tầm trung, CPU i5, GPU RTX 3050 Ti, RAM 16GB.',
                'price' => 22000000,
                'discount_price' => 20500000,
                'stock' => 12,
                'category_id' => 1,
                'image' => 'products/acer_nitro_5.jpg',
                'gallery' => json_encode([
                    'products/acer_nitro_5_1.jpg',
                    'products/acer_nitro_5_2.jpg',
                ]),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
