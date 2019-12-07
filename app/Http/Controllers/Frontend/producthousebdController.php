<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class producthousebdController extends Controller
{

    public function index()
    {
        $product = Product::all();

        return view('Frontend.index')->with('products', $product);
    }
    public function productDetails($id)
    {
        $product = Product::find($id);
        return view('Frontend.singleProduct')->with('product', $product);
    }
    public function orderForm($id)
    {
        $product = Product::find($id);
        return view('Frontend.orderForm')->with('product', $product);
    }
    public function confirmOrder(Request $request, $id)
    {
        $product = Product::find($id);
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->product_id = $id;
        $order->email = $request->email;

        $order->phone = $request->phone;
        $order->name = $request->name;
        $order->shipping_address = $request->address;

        $order->nearest_city = $request->city;

        $order->payment_method = $request->payment;
        $order->payment_status = 0;
        $order->order_status = 0;

        $order->save();
        return view('Frontend.confirmationPage')->with('product', $product);
    }
}