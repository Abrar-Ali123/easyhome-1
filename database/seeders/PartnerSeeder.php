<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        $partners = [
            [
                'name' => 'شركة الراجحي للتطوير العقاري',
                'logo' => 'partners/rajhi.png',
                'website' => 'https://www.alrajhi.com',
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'دار الأركان',
                'logo' => 'partners/dar-alarkan.png',
                'website' => 'https://www.dar-alarkan.com',
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'شركة جبل عمر للتطوير',
                'logo' => 'partners/jabal-omar.png',
                'website' => 'https://www.jabal-omar.com',
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'شركة إعمار المدينة الاقتصادية',
                'logo' => 'partners/emaar.png',
                'website' => 'https://www.emaar.com',
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => 'شركة مكة للإنشاء والتعمير',
                'logo' => 'partners/makkah.png',
                'website' => 'https://www.mcdc.com.sa',
                'is_active' => true,
                'order' => 5
            ]
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
