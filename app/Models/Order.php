<?php

namespace App\Models;

use App\Enums\orderStutsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'amount',
        'status',
        'notes',
        // 'payment_method_id',
        'user_id',
        'shipping_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class ,'order_users');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    protected $casts = [
        'status' => orderStutsEnums::class,
    ];

}
