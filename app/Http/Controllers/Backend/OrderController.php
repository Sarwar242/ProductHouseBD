<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('Backend.orders.index')->with('orders', $orders);
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('Backend.orders.show')->with('order', $order);
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        session()->flash('flash_message_success', 'The Order has been deleted Successfully!');

        return redirect()->route('admin.orders');
    }

    public function completed($id)
    {
        $order = Order::find($id);
        if ($order->order_status) {
            $order->order_status = 0;
            session()->flash('flash_message_success', 'The Order has been incomplete again!');
            $order->save();
        } else {
            $order->order_status = 1;
            session()->flash('flash_message_success', 'The Order has been completed successfully!');
            $order->save();
        }
        return redirect()->route('admin.order.show', $id);
    }
    public function paid($id)
    {
        $order = Order::find($id);
        if ($order->is_paid) {
            $order->is_paid = 0;
            session()->flash('flash_message_success', 'The Order has been unpaid again!');
            $order->save();
        } else {
            $order->is_paid = 1;
            session()->flash('flash_message_success', 'The Order has been paid successfully!');
            $order->save();
        }
        return redirect()->route('admin.order.show', $id);
    }

}