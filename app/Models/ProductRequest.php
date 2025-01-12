<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_id', 'neighborhoods', 'category', 'description'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
