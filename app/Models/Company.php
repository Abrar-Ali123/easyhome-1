<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'phone'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $hidden = ['created_at', 'updated_at'];

    public function getCompanyNameAttribute()
    {
        return strtoupper($this->name);
    }
}
