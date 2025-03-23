<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'title' => 'ايزي هوم للتسويق العقاري',
                'subtitle' => 'نقدم لك خدمات التسويق العقاري بكل احترافية ومصداقية',
                'description' => 'نحن نقدم لك خدمات التسويق العقاري بكل احترافية ومصداقية',
                'image' => 'sliders/hero-1.jpg',
                'button_text' => 'تواصل معنا',
                'button_link' => '/contact',
                'order' => 1,
                'is_active' => true
            ]
        ];

        foreach ($sliders as $slider) {
            HeroSlider::create($slider);
        }
    }
}
