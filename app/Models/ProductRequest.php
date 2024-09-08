<?php

namespace App\Models;

use App\ProductConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'neighborhoods',
        'category', // استخدام التصنيف كنص بدلاً من ID
        'description',
    ];

    // دالة لإرجاع الأيقونة الخاصة بالتصنيف
    public function getCategoryIcon()
    {
        return ProductConstants::CATEGORY_ICONS[$this->category] ?? 'fa-question';
    }
}
