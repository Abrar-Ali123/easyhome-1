<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    public function run()
    {
        $reasons = [
            [
                'title' => 'إدارة الأملاك',
                'description' => 'نقدم خدمات إدارة الأملاك بشكل احترافي يضمن أعلى عائد للمالك',
                'icon' => 'fas fa-building',
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'التسويق العقاري',
                'description' => 'نسوق عقارك بأحدث الوسائل التسويقية للوصول لأكبر شريحة من المستفيدين',
                'icon' => 'fas fa-chart-line',
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'التطوير العقاري',
                'description' => 'نقدم حلول تطويرية مبتكرة تواكب تطلعات عملائنا',
                'icon' => 'fas fa-home',
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'الاستشارات العقارية',
                'description' => 'نقدم استشارات عقارية احترافية تساعدك في اتخاذ قرارك الاستثماري',
                'icon' => 'fas fa-comments',
                'order' => 4,
                'is_active' => true
            ]
        ];

        foreach ($reasons as $reason) {
            WhyChooseUs::create($reason);
        }
    }
}
