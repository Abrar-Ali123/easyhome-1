<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Land;
use App\Models\City;

class LandSeeder extends Seeder
{
    public function run()
    {
        $cities = City::whereNull('parent_id')->get();
        $neighborhoods = City::whereNotNull('parent_id')->get();

        $lands = [
            [
                'title' => 'أرض سكنية في حي الملقا',
                'location' => 'شارع الأمير محمد بن سلمان',
                'description' => 'أرض سكنية مميزة في حي الملقا، مخطط معتمد وجاهز للبناء. تتميز بموقعها الاستراتيجي وقربها من الخدمات الرئيسية.',
                'price' => 1500000.00,
                'area' => 750,
                'property_usage' => 'سكني',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الملقا')->first()->id,
                'image' => 'lands/land1.jpg'
            ],
            [
                'title' => 'أرض تجارية في حي العزيزية',
                'location' => 'طريق الملك عبدالعزيز',
                'description' => 'أرض تجارية على شارع تجاري رئيسي، مناسبة لإقامة مجمع تجاري أو مكتبي. تصريح بناء جاهز.',
                'price' => 3500000.00,
                'area' => 1200,
                'property_usage' => 'تجاري',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'جدة')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'العزيزية')->first()->id,
                'image' => 'lands/land2.jpg'
            ],
            [
                'title' => 'أرض سكنية في حي النرجس',
                'location' => 'شارع عمر بن الخطاب',
                'description' => 'أرض سكنية في حي النرجس، مخطط معتمد وجاهز للبناء. مناسبة لبناء فيلا سكنية.',
                'price' => 900000.00,
                'area' => 500,
                'property_usage' => 'سكني',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'النرجس')->first()->id,
                'image' => 'lands/land3.jpg'
            ],
            [
                'title' => 'أرض استثمارية في حي الشاطئ',
                'location' => 'طريق الملك فهد',
                'description' => 'أرض استثمارية مميزة في حي الشاطئ، مناسبة لإقامة مجمع سكني استثماري. قريبة من الكورنيش والخدمات.',
                'price' => 2800000.00,
                'area' => 900,
                'property_usage' => 'استثماري',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'الدمام')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الشاطئ')->first()->id,
                'image' => 'lands/land4.jpg'
            ],
            [
                'title' => 'أرض سكنية في حي الرحاب',
                'location' => 'شارع الإمام الشافعي',
                'description' => 'أرض سكنية في موقع حيوي، مناسبة لبناء فلل سكنية. جميع الخدمات متوفرة والمخطط معتمد.',
                'price' => 1200000.00,
                'area' => 600,
                'property_usage' => 'سكني',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الرحاب')->first()->id,
                'image' => 'lands/land5.jpg'
            ],
            [
                'title' => 'أرض تجارية في حي الأندلس',
                'location' => 'طريق الأمير ماجد',
                'description' => 'أرض تجارية على زاوية شارعين تجاريين، مناسبة لإقامة مول تجاري. تصاريح البناء جاهزة.',
                'price' => 4200000.00,
                'area' => 1500,
                'property_usage' => 'تجاري',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'جدة')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الأندلس')->first()->id,
                'image' => 'lands/land6.jpg'
            ],
            [
                'title' => 'أرض صناعية في المدينة الصناعية',
                'location' => 'طريق الخرج',
                'description' => 'أرض صناعية مرخصة، مناسبة لإقامة مصنع أو مستودعات. جميع الخدمات الصناعية متوفرة.',
                'price' => 5500000.00,
                'area' => 3000,
                'property_usage' => 'صناعي',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'المدينة الصناعية')->first()->id,
                'image' => 'lands/land7.jpg'
            ],
            [
                'title' => 'أرض زراعية في وادي الدواسر',
                'location' => 'طريق الخرج الرياض',
                'description' => 'أرض زراعية خصبة مع بئر ارتوازي، مناسبة للمشاريع الزراعية. تربة خصبة ومياه وفيرة.',
                'price' => 2800000.00,
                'area' => 10000,
                'property_usage' => 'زراعي',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'وادي الدواسر')->first()->id,
                'image' => 'lands/land8.jpg'
            ],
            [
                'title' => 'أرض استثمارية في حي الروضة',
                'location' => 'شارع الملك عبدالله',
                'description' => 'أرض استثمارية مميزة، مناسبة لإقامة مجمع سكني استثماري. موقع حيوي وعوائد استثمارية مجزية.',
                'price' => 6500000.00,
                'area' => 2500,
                'property_usage' => 'استثماري',
                'property_type' => 'أرض',
                'city_id' => $cities->where('name', 'جدة')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الروضة')->first()->id,
                'image' => 'lands/land9.jpg'
            ]
        ];

        foreach ($lands as $land) {
            Land::create($land);
        }
    }
}
