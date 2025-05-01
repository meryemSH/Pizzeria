<?php

namespace App\Models;

use App\Enums\ContactStatusEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'full_name',
        'phone',
        'age',
        'message',
        'objet',
        'status'
    ];

    protected $casts = [
        'status' => ContactStatusEnums::class,
    ];
}
