<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    // تحديد الأعمدة التي يمكن تعبئتها في قاعدة البيانات
    protected $fillable = ['user_id', 'product_id'];

    // العلاقة مع موديل User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع موديل Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
