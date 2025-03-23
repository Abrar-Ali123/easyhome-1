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
        'image',
        'images',
        'city_id',
        'neighborhood_id',
        'monthly_installment',
        'ad_number',
        'property_usage',
        'property_facade',
        'profile_project',
        'croquis',
        'is_for_rent', // إضافة حقل للإيجار
        'rent_price', // سعر الإيجار الشهري
        'rent_deposit', // مبلغ التأمين
        'rent_period', // مدة الإيجار (بالأشهر)
        'rent_terms', // شروط الإيجار
        'property_type', // نوع العقار
    ];

    const CATEGORIES = [
        'شقة',
        'منزل',
        'فيلا',
        'مكتب',
        // أضف التصنيفات الأخرى هنا
    ];

    const CATEGORY_ICONS = [
        'شقة' => 'fa-building',  // اسم الأيقونة في Font Awesome
        'منزل' => 'fa-home',
        'فيلا' => 'fa-landmark',
        'مكتب' => 'fa-briefcase',
        // أضف أيقونات التصنيفات الأخرى هنا
    ];

    const PROPERTY_USAGE = [
        'بيع',
        'إيجار',
        'بيع وإيجار'
    ];

    const PROPERTY_TYPES = [
        'سكني',
        'تجاري',
        'صناعي',
        'زراعي',
        'استثماري'
    ];

    const RENTAL_PERIODS = [
        3 => '3 أشهر',
        6 => '6 أشهر',
        12 => 'سنة',
        24 => 'سنتين'
    ];

    // مميزات العقار
    public static $propertyFeatures = [
        'مرآب' => 'fas fa-car',
        'مسبح' => 'fas fa-swimming-pool',
        'حديقة' => 'fas fa-tree',
        'مصعد' => 'fas fa-elevator',
        'تكييف مركزي' => 'fas fa-snowflake',
        'مطبخ مجهز' => 'fas fa-utensils',
        'غرفة خادمة' => 'fas fa-person-booth',
        'غرفة حارس' => 'fas fa-user-shield',
        'غرفة غسيل' => 'fas fa-tshirt',
        'مدخل سيارات' => 'fas fa-car-side',
        'نظام إنذار' => 'fas fa-bell',
        'خزان مياه' => 'fas fa-water'
    ];

    // مميزات الموقع
    public static $locationFeatures = [
        'قريب من المسجد' => 'fas fa-mosque',
        'قريب من المدارس' => 'fas fa-school',
        'قريب من الأسواق' => 'fas fa-shopping-cart',
        'قريب من المستشفيات' => 'fas fa-hospital',
        'قريب من الحدائق' => 'fas fa-tree',
        'قريب من المواصلات' => 'fas fa-bus',
        'شارع رئيسي' => 'fas fa-road',
        'منطقة هادئة' => 'fas fa-volume-mute',
        'أمن وحراسة' => 'fas fa-shield-alt',
        'خدمات بلدية' => 'fas fa-city'
    ];

    // دالة لإرجاع الأيقونة الخاصة بكل ميزة
    public function getFeatureIcon($feature)
    {
        $allFeatures = array_merge(self::$propertyFeatures, self::$locationFeatures);
        return $allFeatures[$feature] ?? 'fas fa-question';
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

    public function parent()
    {
        return $this->belongsTo(City::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(City::class, 'parent_id');
    }

    // العلاقة مع المدينة
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->whereNull('parent_id');
    }

    // العلاقة مع الحي
    public function neighborhood()
    {
        return $this->belongsTo(City::class, 'neighborhood_id')->whereNotNull('parent_id');
    }

    public function getFeaturesAttribute($value)
    {
        return explode(',', $value); // تحويل النص إلى مصفوفة بناءً على الفواصل
    }

    // دالة للتحقق من توفر العقار للإيجار
    public function isAvailableForRent()
    {
        return $this->is_for_rent && $this->property_usage != 'بيع';
    }

    // دالة لحساب إجمالي تكلفة الإيجار
    public function calculateTotalRent($months)
    {
        if (!$this->isAvailableForRent()) {
            return 0;
        }
        return ($this->rent_price * $months) + $this->rent_deposit;
    }
}
