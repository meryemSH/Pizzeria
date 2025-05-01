<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'slug',
        'is_featured',
        'description',
        'category_blog_id',
        'content',
        'image',
        'is_published',
        'published_at'
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
               ->whereDate('published_at', '<=', now());
    }

    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class);
    }

}
