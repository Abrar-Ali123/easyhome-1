<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['product_id', 'user_id', 'comment', 'visible'];

    // علاقة التعليق مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة التعليق مع المنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // علاقة التعليق مع الردود
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    // علاقة التعليق مع الإعجابات
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // دالة لتبديل ظهور التعليق
    public function toggleVisibility()
    {
        $this->visible = ! $this->visible;
        $this->save();
    }
}
