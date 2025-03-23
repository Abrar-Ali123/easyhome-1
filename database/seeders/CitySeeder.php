<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            'الرياض' => [
                'النرجس',
                'الملقا',
                'الياسمين',
                'النخيل',
                'العليا',
                'الرحاب',
                'المدينة الصناعية',
                'وادي الدواسر'
            ],
            'جدة' => [
                'الروضة',
                'العزيزية',
                'السلامة',
                'الأندلس'
            ],
            'مكة المكرمة' => [
                'العزيزية',
                'النزهة',
                'الشوقية'
            ],
            'الدمام' => [
                'الشاطئ',
                'الفيصلية',
                'الأنوار'
            ],
            'الخبر' => [
                'الخبر الشمالية',
                'الراكة',
                'العقربية'
            ]
        ];

        foreach ($cities as $cityName => $neighborhoods) {
            $city = City::create([
                'name' => $cityName
            ]);

            foreach ($neighborhoods as $neighborhood) {
                City::create([
                    'name' => $neighborhood,
                    'parent_id' => $city->id
                ]);
            }
        }
    }
}
