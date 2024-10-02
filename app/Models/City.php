<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'parent_id'];

    // العلاقة بين المدينة والأحياء (الأحياء التي تتبع المدينة)
    public function neighborhoods()
    {
        return $this->hasMany(City::class, 'parent_id');
    }

    // العلاقة التي تشير إلى المدينة الرئيسية إذا كان الحي تابعًا
    public function parentCity()
    {
        return $this->belongsTo(City::class, 'parent_id');
    }

    // في موديل City
    public function parent()
    {
        return $this->belongsTo(City::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(City::class, 'parent_id');
    }
}
