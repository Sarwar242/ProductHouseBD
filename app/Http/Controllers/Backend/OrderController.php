<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function orderShow()
    {
        $orders = Order::get();
        return view('Backend.orders.orders')->with('orders', $orders);
    }
}