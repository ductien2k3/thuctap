<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'total_amount',
        'email',
        'phone_number',
        'status',
        'payment',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function shop_products()
    {
        return $this->belongsToMany(Shop_product::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }
    public function shop()
{
    return $this->belongsTo(Shop::class, 'shop_id');
}
}
