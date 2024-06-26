<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_category_id',
        'name',
        'sku',
        'image',
        'overview',
        'description',
        'price'
    ];
    public function shop_category(){
        return $this->belongsTo(related:Shop_category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity');
    }
}
