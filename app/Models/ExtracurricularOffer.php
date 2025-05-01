<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtracurricularOffer extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'slug',
        'description',
        'featured_image',
        'content',
        'is_published',
        'published_at'
    ];
}
