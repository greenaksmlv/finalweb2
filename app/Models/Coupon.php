<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'expiration_date',
        'redeemed',
        'payment_method',
        'price',
    ];
}
