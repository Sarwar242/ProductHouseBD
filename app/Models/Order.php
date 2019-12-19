<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    //

    public $fillable = [
        'user_id', 'product_id', 'ip_address', 'email',
        'phone', 'name', 'shipping_address', 'nearest_city',
        'payment_method', 'is_paid', 'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}