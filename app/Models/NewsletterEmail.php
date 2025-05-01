<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterEmail extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'email_address',
        'is_enabled'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
