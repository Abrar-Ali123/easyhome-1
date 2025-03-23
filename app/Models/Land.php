<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'image',
        'area',
        'location',
        'city_id',
        'neighborhood_id',
        'is_for_rent',
        'rent_price',
        'rent_deposit',
        'rent_period',
        'rent_terms',
        'property_usage',
        'property_type' // نوع العقار
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

    // دالة للتحقق من توفر الأرض للإيجار
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
