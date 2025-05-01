<?php

namespace App\Models;

use App\Enums\SchoolPartnershipEnums;
use Illuminate\Database\Eloquent\Model;
use App\Enums\schoolPartnershipsActivityEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolPartnership extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'image',
        'company_name',
        'company_city_id',
        'company_address',
        'responsible_name',
        'responsible_email',
        'responsible_phone',
        'company_phone',
        'company_email',
        'content',
        'status',
        'is_published',
        'activity',
        'published_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'company_city_id');
    }

    protected $casts = [
        'status' => SchoolPartnershipEnums::class,
        'activity' => schoolPartnershipsActivityEnums::class,

    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereDate('published_at', '<=', now());
    }
}
