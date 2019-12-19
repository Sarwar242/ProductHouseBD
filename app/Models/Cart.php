<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillable = [
        'user_id', 'product_id', 'ip_address', 'order_id',
        'product_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public static function totalItems()
    {
        $cartcnt = Cart::where('user_id', Auth::id())
            ->count();
//App\Models\Cart::totalItems()
        return $cartcnt;
    }
    public static function totalCarts()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->get();

        return $cart;
    }
}