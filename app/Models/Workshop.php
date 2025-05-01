<?php

namespace App\Models;

use App\Enums\WorshopsDureeEnums;
use App\Enums\WorshopsTypeEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;


class Workshop extends Model
{
    // use InteractsWithMedia;
    use HasFactory;

    protected $fillable =
    [
        'name',
        'slug',
        'ingredient',
        'content',
        'is_published',
        'publish_date',
        'price',
        'image',
        'old_price',
        'category_item_id',
        'timetables',
    ];
  
    public function scopePublished($query){
        return $query->where('is_published', true)
                    ->whereDate('publish_date', '<=', now());
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_item_id');
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class ,'user_workshops');
    }
  

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function orders()
{
    return $this->hasManyThrough(
        Order::class,
        OrderItem::class,
        'workshop_id', // Foreign key sur la table intermédiaire
        'id', // Clé locale sur la table cible
        'id', // Clé locale sur la table source
        'order_id' // Clé étrangère sur la table intermédiaire
    );
}

}
