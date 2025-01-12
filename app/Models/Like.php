<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id'];

    // علاقة الإعجاب مع أي موديل يمكن أن يتلقى إعجابات
    public function likeable()
    {
        return $this->morphTo();
    }

    // علاقة الإعجاب مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
