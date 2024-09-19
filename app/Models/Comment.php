<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['product_id', 'user_id', 'comment', 'visible'];

    // علاقة الردود
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // علاقة المنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
