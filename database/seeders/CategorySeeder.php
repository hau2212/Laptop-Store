<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Laptop Gaming',
                'description' => 'Dành cho game thủ hiệu năng cao',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop Văn Phòng',
                'description' => 'Nhẹ, pin lâu, phù hợp công việc hàng ngày',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop Đồ Họa',
                'description' => 'Hiệu năng mạnh mẽ cho designer và kỹ sư',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
