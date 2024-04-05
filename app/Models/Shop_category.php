<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_category extends Model
{
    use HasFactory;
    
    protected $table = 'shop_category'; // Đặt tên bảng một cách rõ ràng
    
    protected $fillable = [
        'shop_id',
        'name',
        'image',
    ];
    
    public function shop(){
        return $this->belongsTo(Shop::class, 'shop_id'); // Chỉ định tên khóa ngoại
    }
}
