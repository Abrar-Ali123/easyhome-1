<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('cities')->insert([
                [
                    'name' => 'القاهرة',
                    'image' => 'cairo.jpg', // اسم الصورة إذا كانت موجودة في مجلد الصور
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'الإسكندرية',
                    'image' => 'alexandria.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // يمكنك إضافة المزيد من المدن هنا
            ]);
        }
    }
}
