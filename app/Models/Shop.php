<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'address', 'image', 'phone_number', 'description', 'email', 'user_id'];

    // ...
}
