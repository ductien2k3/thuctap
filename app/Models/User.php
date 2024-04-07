<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country',
        'role',
        'email',
        'password',
        'user_name',
        'first_name',
        'last_name',
        'telephone_code',
        'area',
        'phone_number',
        'address',
        'image',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Kiểm tra xem người dùng có cửa hàng hay không.
     *
     * @return bool
     */
    public function hasShop()
    {
        return $this->shop()->exists();
    }
    /**
     * Xác định mối quan hệ 1-1 với cửa hàng.
     */
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

}