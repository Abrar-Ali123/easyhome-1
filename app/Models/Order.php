<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'status', // حالة الطلب
    ];

    /**
     * حالة الطلبات المتاحة.
     *
     * @var array
     */
    public static $statuses = [
        'pending' => 'قيد الانتظار',
        'processing' => 'قيد المعالجة',
        'completed' => 'مكتمل',
        'canceled' => 'ملغى',
    ];

    /**
     * الحصول على اسم الحالة.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return self::$statuses[$this->status] ?? 'غير معروف';
    }

    /**
     * العلاقة مع المستخدم.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * العلاقة مع المنتج.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
