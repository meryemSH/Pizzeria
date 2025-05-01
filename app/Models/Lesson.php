<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'workshop_id',
        'title',
        'slug',
        'url',
        'short_description',
        'content',
        'is_free',
        'featured_image',
        'date_publication',
        'is_published',
        'published_at'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_users');
    }

    public function hasNext():bool
    {
        return $this->workshop->lessons()->where('id', '>', $this->id)->exists();
    }

    public function hasPrevious():bool
    {
        return $this->workshop->lessons()->where('id', '<', $this->id)->exists();
    }

    public function getNext(): Model
    {
        return $this->workshop->lessons()->where('id', '>', $this->id)->first();
    }

    public function getPrevious():Model
    {
        return $this->workshop->lessons()->where('id', '<', $this->id)->first();
    }

    public function scopePublished($query)
    {

        return $query->where('is_published', true)
            ->whereDate('published_at', '<=', now());
    }
}
