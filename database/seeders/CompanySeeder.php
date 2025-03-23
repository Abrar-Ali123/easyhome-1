<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            [
                'name' => 'شركة التطوير العقاري',
                'logo' => 'companies/company1.png',
                'website' => 'https://company1.com',
                'title' => 'شريك استراتيجي',
                'description' => 'شركة رائدة في مجال التطوير العقاري والاستثمار',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'مجموعة الإسكان',
                'logo' => 'companies/company2.png',
                'website' => 'https://company2.com',
                'title' => 'شريك تنفيذي',
                'description' => 'متخصصون في تنفيذ المشاريع السكنية الكبرى',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'المستقبل للاستثمار',
                'logo' => 'companies/company3.png',
                'website' => 'https://company3.com',
                'title' => 'شريك استثماري',
                'description' => 'نقدم حلول استثمارية مبتكرة في القطاع العقاري',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'بنك الإسكان',
                'logo' => 'companies/company4.png',
                'website' => 'https://company4.com',
                'title' => 'شريك تمويلي',
                'description' => 'نوفر حلول تمويلية متكاملة للمشاريع العقارية',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'شركة التسويق العقاري',
                'logo' => 'companies/company5.png',
                'website' => 'https://company5.com',
                'title' => 'شريك تسويقي',
                'description' => 'خبراء في التسويق العقاري والحلول الرقمية',
                'order' => 5,
                'is_active' => true
            ]
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
