<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;


    protected $fillable =
    [
        'title',
        'slug',
        'image',
        'is_enabled'

    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_id');
    }
}
