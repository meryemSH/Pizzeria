<?php

namespace App\Models;

use App\Enums\CategoryTypeEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'slug',
        'image',
        'is_enabled'

    ];

    

    protected $casts = [
        'type' => CategoryTypeEnums::class,
    ];



}
