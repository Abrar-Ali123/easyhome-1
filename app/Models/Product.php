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
        'property_features', 
        'location_features',
    ];

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
    
    public static $featuresList = [
        'مرآب' => 'fas fa-car',
        'مسبح' => 'fas fa-swimming-pool',
        'حديقة' => 'fas fa-tree',
        'أمن' => 'fas fa-shield-alt',
        'مصعد' => 'fas fa-elevator',
        'كميرات مراقبة' => 'fas fa-video',
        'سمارت هوم' => 'fas fa-home',
        'دخول ذكي' => 'fas fa-key',
        'غاز مركزي' => 'fas fa-gas-pump',
        'مدخلين' => 'fas fa-door-open',
        'مدخل خاص' => 'fas fa-door-closed',
        'مكنسة كهربائية' => 'fas fa-broom',
        'مساجد وحدائق عامة' => 'fas fa-mosque',
        'تشطيبات مدودن' => 'fas fa-paint-roller',
        'اسقف مرتفع' => 'fas fa-building',
        'انتركوم' => 'fas fa-phone',
        'مواقف' => 'fas fa-parking',
        'واجهات عصرية' => 'fas fa-building',
        'واجهات بنورامية' => 'fas fa-mountain',
        'لاندسكير' => 'fas fa-tree',
        'لاونج' => 'fas fa-couch',
        'سينماء' => 'fas fa-film',
        'منطقة أطفال' => 'fas fa-child',
        'نادي رياضي' => 'fas fa-dumbbell',
        'مواقف ذكية' => 'fas fa-car-side',
    ];
    
    public static $locationFeaturesList = [
        'قريب من المترو' => 'fas fa-subway',
        'بالقرب من المدرسة' => 'fas fa-school',
        'قريب من المطار' => 'fas fa-plane-departure',
        'إطلالة على البحر' => 'fas fa-water',
        'مناطق ترفيهية' => 'fas fa-smile',
        'مصعد' => 'fas fa-elevator',
        'كميرات مراقبة' => 'fas fa-video',
        'سمارت هوم' => 'fas fa-home',
        'دخول ذكي' => 'fas fa-key',
        'غاز مركزي' => 'fas fa-gas-pump',
        'مدخلين' => 'fas fa-door-open',
        'مدخل خاص' => 'fas fa-door-closed',
        'مكنسة كهربائية' => 'fas fa-broom',
        'مساجد وحدائق عامة' => 'fas fa-mosque',
        'تشطيبات مدودن' => 'fas fa-paint-roller',
        'اسقف مرتفع' => 'fas fa-building',
        'انتركوم' => 'fas fa-phone',
        'مواقف' => 'fas fa-parking',
        'واجهات عصرية' => 'fas fa-building',
        'واجهات بنورامية' => 'fas fa-mountain',
        'لاندسكير' => 'fas fa-tree',
        'لاونج' => 'fas fa-couch',
        'سينماء' => 'fas fa-film',
        'منطقة أطفال' => 'fas fa-child',
        'نادي رياضي' => 'fas fa-dumbbell',
        'مواقف ذكية' => 'fas fa-car-side',
    ];

    public function getCategoryIcon()
    {
        return self::CATEGORY_ICONS[$this->category] ?? 'fa-question';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(City::class, 'neighborhood_id');
    }

    public function getPropertyFeaturesAttribute($value)
    {
        return explode(',', $value);
    }

    public function getLocationFeaturesAttribute($value)
    {
        return explode(',', $value);
    }

    public function setPropertyFeaturesAttribute($value)
    {
        $this->attributes['property_features'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function setLocationFeaturesAttribute($value)
    {
        $this->attributes['location_features'] = is_array($value) ? implode(',', $value) : $value;
    }
}
