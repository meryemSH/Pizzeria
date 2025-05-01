<?php

namespace App\Models;

use App\Enums\WorshopsResevationstatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopReservation extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'first_name',
        'last_name',
        'email',
        'phone',
        'city_id',
        'address',
        'status'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected $casts = [
        'status' => WorshopsResevationstatus::class,
    ];
}
