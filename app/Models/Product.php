<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'category',
        'image',
        'images',
        'monthly_installment',
        'ad_number',
        'property_usage',
        'property_facade',
        'property_type',
        'profile_project',
        'city_id',
        'neighborhood_id',
        'created_by',
        'propertyFeatures',
        'locationFeatures',
        'is_for_rent',
        'rent_price',
        'rent_deposit',
        'rent_period',
        'rent_terms',
    ];

    protected $casts = [
        'propertyFeatures' => 'array',
        'locationFeatures' => 'array'
    ];

    public function getFeatureIcon($feature)
    {
        $icons = [
            // مميزات العقار
            'مكيف مركزي' => 'fas fa-snowflake',
            'مطبخ مجهز' => 'fas fa-utensils',
            'غرفة خادمة' => 'fas fa-person-booth',
            'مسبح خاص' => 'fas fa-swimming-pool',
            'موقف خاص' => 'fas fa-car',
            'مصعد' => 'fas fa-elevator',
            'مفروش بالكامل' => 'fas fa-couch',
            'خدمة تنظيف' => 'fas fa-broom',
            'انترنت' => 'fas fa-wifi',
            'شرفة' => 'fas fa-door-open',
            'غرفة غسيل' => 'fas fa-tshirt',
            'نظام أمني' => 'fas fa-shield-alt',
            'واجهات زجاجية' => 'fas fa-building',
            'أبواب كبيرة' => 'fas fa-door-open',
            'ارتفاع عالي' => 'fas fa-arrows-alt-v',
            'نظام إطفاء' => 'fas fa-fire-extinguisher',
            'نظام مراقبة' => 'fas fa-video',
            'تكييف صناعي' => 'fas fa-fan',

            // مميزات الموقع
            'قريب من المدارس' => 'fas fa-school',
            'قريب من المستشفيات' => 'fas fa-hospital',
            'قريب من المسجد' => 'fas fa-mosque',
            'قريب من الأسواق' => 'fas fa-shopping-cart',
            'قريب من المنتزهات' => 'fas fa-tree',
            'قريب من البحر' => 'fas fa-water',
            'قريب من المطاعم' => 'fas fa-utensils',
            'قريب من المولات' => 'fas fa-shopping-bag',
            'منطقة راقية' => 'fas fa-star',
            'على الشارع الرئيسي' => 'fas fa-road',
            'قريب من المترو' => 'fas fa-subway',
            'منطقة حيوية' => 'fas fa-city',
            'سهولة الوصول' => 'fas fa-map-marked-alt',
            'منطقة صناعية' => 'fas fa-industry',
            'قرب الطرق السريعة' => 'fas fa-road',
            'خدمات لوجستية' => 'fas fa-truck',
            'أمن على مدار الساعة' => 'fas fa-shield-alt'
        ];

        return $icons[$feature] ?? 'fas fa-check';
    }

    const CATEGORIES = [
        'شقة',
        'منزل',
        'فيلا',
        'مكتب',
    ];

    const CATEGORY_ICONS = [
        'شقة' => 'fa-building',
        'منزل' => 'fa-home',
        'فيلا' => 'fa-landmark',
        'مكتب' => 'fa-briefcase',
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

    public function getCategoryIcon()
    {
        return self::CATEGORY_ICONS[$this->category] ?? 'fa-question';
    }

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

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->whereNull('parent_id');
    }

    public function neighborhood()
    {
        return $this->belongsTo(City::class, 'neighborhood_id')->whereNotNull('parent_id');
    }

    public function isAvailableForRent()
    {
        return $this->is_for_rent && $this->property_usage != 'بيع';
    }

    public function calculateTotalRent($months)
    {
        if (!$this->isAvailableForRent()) {
            return 0;
        }
        return ($this->rent_price * $months) + $this->rent_deposit;
    }
}