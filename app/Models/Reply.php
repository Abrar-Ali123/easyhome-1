<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['comment_id', 'user_id', 'reply'];

    // علاقة الرد مع التعليق
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    // علاقة الرد مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الرد مع الإعجابات
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
