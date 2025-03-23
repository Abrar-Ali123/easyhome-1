<?php

namespace Database\Seeders;

use App\Models\CompanyValue;
use Illuminate\Database\Seeder;

class ValuesSeeder extends Seeder
{
    public function run()
    {
        $values = [
            [
                'title' => 'رؤيتنا',
                'description' => 'نسعى لنكون الخيار الأول في تقديم الحلول العقارية المتكاملة',
                'icon' => 'fas fa-eye',
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'رسالتنا',
                'description' => 'تقديم خدمات عقارية متكاملة تلبي احتياجات عملائنا وتتجاوز توقعاتهم من خلال فريق عمل محترف',
                'icon' => 'fas fa-bullseye',
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'قيمنا',
                'description' => 'الاحترافية والمصداقية والشفافية في جميع تعاملاتنا',
                'icon' => 'fas fa-star',
                'order' => 3,
                'is_active' => true
            ]
        ];

        foreach ($values as $value) {
            CompanyValue::create($value);
        }
    }
}
