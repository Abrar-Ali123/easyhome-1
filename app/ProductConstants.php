<?php

namespace App;

class ProductConstants
{
    // مصفوفة التصنيفات
    public const CATEGORIES = [
        'شقة' => 'شقة',
        'منزل' => 'منزل',
        'فيلا' => 'فيلا',
        'مكتب' => 'مكتب',
        // أضف التصنيفات الأخرى هنا
    ];

    // مصفوفة الأيقونات المرتبطة بكل تصنيف
    public const CATEGORY_ICONS = [
        'شقة' => 'fa-building',
        'منزل' => 'fa-home',
        'فيلا' => 'fa-landmark',
        'مكتب' => 'fa-briefcase',
        // أضف أيقونات التصنيفات الأخرى هنا
    ];

    // مصفوفة المميزات والأيقونات الخاصة بها
    public const FEATURES = [
        'مرآب' => 'fas fa-car',
        'مسبح' => 'fas fa-swimming-pool',
        'حديقة' => 'fas fa-tree',
        'أمن' => 'fas fa-shield-alt',
        // أضف مميزات أخرى هنا
    ];
}
