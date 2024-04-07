<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop_product()
    {
        return $this->belongsTo(Shop_product::class, 'product_id');
    }
    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

}