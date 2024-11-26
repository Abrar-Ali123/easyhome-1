<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_description',
        'keywords',
        'image',
        'category_blog_id',
    ];

    /**
     * Get the category blog associated with the post.
     */
    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_blog_id');
    }
}
