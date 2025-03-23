<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'name' => 'محمد السعيد',
                'position' => 'مستثمر عقاري',
                'content' => 'تجربتي مع ايزي هوم كانت ممتازة. الفريق محترف جداً وساعدني في العثور على العقار المناسب بسرعة وسهولة.',
                'image' => 'testimonials/person1.jpg',
                'rating' => 5,
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'سارة العتيبي',
                'position' => 'مالكة عقار',
                'content' => 'أشكر فريق ايزي هوم على احترافيتهم في تسويق عقاري. تم بيع العقار بسعر ممتاز وفي وقت قياسي.',
                'image' => 'testimonials/person2.jpg',
                'rating' => 5,
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'عبدالله الغامدي',
                'position' => 'مشتري',
                'content' => 'منصة سهلة الاستخدام وتوفر معلومات دقيقة عن العقارات. وجدت منزل أحلامي بفضل ايزي هوم.',
                'image' => 'testimonials/person3.jpg',
                'rating' => 4,
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'نورة القحطاني',
                'position' => 'مستأجرة',
                'content' => 'خدمة عملاء متميزة وسرعة في الرد. ساعدوني في العثور على شقة مناسبة في موقع ممتاز.',
                'image' => 'testimonials/person4.jpg',
                'rating' => 5,
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => 'فهد الشمري',
                'position' => 'مطور عقاري',
                'content' => 'شراكتنا مع ايزي هوم كانت مثمرة جداً. منصة احترافية تساعد في الوصول إلى العملاء المناسبين.',
                'image' => 'testimonials/person5.jpg',
                'rating' => 5,
                'is_active' => true,
                'order' => 5
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
