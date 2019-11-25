<?php

namespace App\Http\Controllers\Backend;

class OrderController extends Controller
{
    public function orderShow()
    {
        $orders = Order::get();
        return view('admin.orders.orders')->with('orders', $orders);
    }
}