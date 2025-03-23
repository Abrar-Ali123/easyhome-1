<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SectionTitle;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sections = [
            [
                'section_key' => 'hero',
                'title' => 'ابحث عن منزل أحلامك',
                'subtitle' => 'نقدم لك أفضل العقارات في المملكة العربية السعودية',
                'order' => 1,
                'is_active' => true
            ],
            [
                'section_key' => 'featured_properties',
                'title' => 'عقارات مميزة',
                'subtitle' => 'اكتشف أفضل العقارات المميزة لدينا',
                'order' => 2,
                'is_active' => true
            ],
            [
                'section_key' => 'lands',
                'title' => 'أراضي للبيع',
                'subtitle' => 'استثمر في أفضل الأراضي السكنية والتجارية',
                'order' => 3,
                'is_active' => true
            ],
            [
                'section_key' => 'partners',
                'title' => 'شركاؤنا',
                'subtitle' => 'نفتخر بشراكتنا مع أفضل الشركات العقارية',
                'order' => 4,
                'is_active' => true
            ],
            [
                'section_key' => 'testimonials',
                'title' => 'آراء عملائنا',
                'subtitle' => 'ماذا يقول عملاؤنا عن خدماتنا',
                'order' => 5,
                'is_active' => true
            ],
            [
                'section_key' => 'blog',
                'title' => 'المدونة العقارية',
                'subtitle' => 'آخر الأخبار والمقالات في عالم العقارات',
                'order' => 6,
                'is_active' => true
            ],
            [
                'section_key' => 'contact',
                'title' => 'تواصل معنا',
                'subtitle' => 'نحن هنا لمساعدتك في رحلتك العقارية',
                'order' => 7,
                'is_active' => true
            ],
            [
                'section_key' => 'about',
                'title' => 'من نحن',
                'subtitle' => 'تعرف على ايزي هوم للعقارات',
                'order' => 8,
                'is_active' => true
            ],
            [
                'section_key' => 'services',
                'title' => 'خدماتنا',
                'subtitle' => 'نقدم مجموعة متكاملة من الخدمات العقارية',
                'order' => 9,
                'is_active' => true
            ],
            [
                'section_key' => 'why_choose_us',
                'title' => 'لماذا تختارنا',
                'subtitle' => 'نحن نقدم أفضل الخدمات العقارية في المملكة',
                'order' => 10,
                'is_active' => true
            ],
            [
                'section_key' => 'latest_properties',
                'title' => 'أحدث العقارات',
                'subtitle' => 'اكتشف أحدث العقارات المضافة لدينا',
                'order' => 11,
                'is_active' => true
            ],
            [
                'section_key' => 'newsletter',
                'title' => 'النشرة البريدية',
                'subtitle' => 'اشترك في نشرتنا البريدية للحصول على آخر العروض والأخبار',
                'order' => 12,
                'is_active' => true
            ],
            [
                'section_key' => 'statistics',
                'title' => 'إحصائياتنا',
                'subtitle' => 'أرقام تتحدث عن نجاحنا',
                'order' => 13,
                'is_active' => true
            ],
            [
                'section_key' => 'download_app',
                'title' => 'تطبيق ايزي هوم',
                'subtitle' => 'حمل تطبيقنا واحصل على تجربة أفضل',
                'order' => 14,
                'is_active' => true
            ],
            [
                'section_key' => 'rental_properties',
                'title' => 'عقارات للإيجار',
                'subtitle' => 'اكتشف أفضل العقارات المتاحة للإيجار',
                'order' => 15,
                'is_active' => true
            ]
        ];

        foreach ($sections as $section) {
            SectionTitle::create($section);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SectionTitle::truncate();
    }
};
