<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'quantity',
        'name',
        'unit_price_amount',
        'order_id',
        'workshop_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function workshop()
    {
        return $this->belongsTo(workshop::class);
    }
}
