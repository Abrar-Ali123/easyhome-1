<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use Illuminate\Database\Seeder;

class CategoryBlogSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'نصائح عقارية',
                'slug' => 'real-estate-tips',
                'description' => 'نصائح وإرشادات مفيدة في مجال العقارات والاستثمار العقاري',
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'أخبار السوق العقاري',
                'slug' => 'market-news',
                'description' => 'آخر أخبار وتطورات السوق العقاري في المملكة العربية السعودية',
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'تمويل عقاري',
                'slug' => 'real-estate-finance',
                'description' => 'معلومات عن التمويل العقاري والرهن العقاري وأفضل الحلول التمويلية',
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'استثمار عقاري',
                'slug' => 'real-estate-investment',
                'description' => 'دليلك للاستثمار الناجح في سوق العقارات السعودي',
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => 'تطوير عقاري',
                'slug' => 'real-estate-development',
                'description' => 'كل ما يتعلق بالتطوير العقاري والمشاريع الجديدة',
                'is_active' => true,
                'order' => 5
            ],
            [
                'name' => 'تشريعات وقوانين',
                'slug' => 'laws-and-regulations',
                'description' => 'كل ما يتعلق بالتشريعات والقوانين العقارية في المملكة العربية السعودية',
                'is_active' => true,
                'order' => 6
            ],
            [
                'name' => 'دليل المشتري',
                'slug' => 'buyer-guide',
                'description' => 'دليل شامل للمشترين العقاريين في المملكة العربية السعودية',
                'is_active' => true,
                'order' => 7
            ],
            [
                'name' => 'دليل المستأجر',
                'slug' => 'tenant-guide',
                'description' => 'دليل شامل للمستأجرين العقاريين في المملكة العربية السعودية',
                'is_active' => true,
                'order' => 8
            ]
        ];

        foreach ($categories as $category) {
            CategoryBlog::create($category);
        }
    }
}
