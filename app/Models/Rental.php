<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'price_per_month',
        'security_deposit',
        'start_date',
        'end_date',
        'status',
        'terms'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // العلاقة مع المستأجر
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع العقار (منتج أو أرض)
    public function rentable()
    {
        return $this->morphTo();
    }

    // حساب المدة المتبقية للإيجار
    public function getRemainingDaysAttribute()
    {
        return now()->diffInDays($this->end_date, false);
    }

    // حساب إجمالي قيمة الإيجار
    public function getTotalRentAttribute()
    {
        return $this->price_per_month * $this->start_date->diffInMonths($this->end_date);
    }
}
