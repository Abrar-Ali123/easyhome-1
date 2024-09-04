<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // تحديد الحقول القابلة للتحديث عبر الواجهة
    protected $fillable = [
        'title',
        'description',
        'location',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'features',
        'category',
        'image', // إذا كنت تستخدم حقل واحد للصور
        'images', // إذا كنت تستخدم حقل متعدد للصور
        'city_id',
    ];

    const CATEGORIES = [
        'شقة' => 'شقة',
        'منزل' => 'منزل',
        'فيلا' => 'فيلا',
        'مكتب' => 'مكتب',
        // أضف التصنيفات الأخرى هنا
    ];

    const CATEGORY_ICONS = [
        'شقة' => 'fa-building',  // اسم الأيقونة في Font Awesome
        'منزل' => 'fa-home',
        'فيلا' => 'fa-landmark',
        'مكتب' => 'fa-briefcase',
        // أضف أيقونات التصنيفات الأخرى هنا
    ];

    // مثال لتخزين المميزات كمصفوفة JSON
    protected $casts = [
        'features' => 'array',
    ];

    public static $featuresList = [
        'مرآب' => 'fas fa-car',
        'مسبح' => 'fas fa-swimming-pool',
        'حديقة' => 'fas fa-tree',
        'أمن' => 'fas fa-shield-alt',
    ];

    // دالة لإرجاع الأيقونة الخاصة بكل ميزة
    public function getFeatureIcon($feature)
    {
        $icons = [
            'مرآب' => 'fas fa-car',
            'مسبح' => 'fas fa-swimming-pool',
            'حديقة' => 'fas fa-tree',
            'أمن' => 'fas fa-shield-alt',
            // أضف أيقونات المميزات الأخرى هنا
        ];

        // التحقق من وجود الأيقونة وإرجاعها، أو إرجاع أيقونة افتراضية
        return $icons[$feature] ?? 'fas fa-question';
    }

    // دالة لإرجاع الأيقونة الخاصة بالتصنيف
    public function getCategoryIcon()
    {
        return self::CATEGORY_ICONS[$this->category] ?? 'fa-question';
    }

    // داخل Product.php
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
