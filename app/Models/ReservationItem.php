<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationItem extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'workshop_reservation_id',
        'workshop_id'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function reservation()
    {
        return $this->belongsTo(WorkshopReservation::class, 'workshop_reservation_id');
    }
}
