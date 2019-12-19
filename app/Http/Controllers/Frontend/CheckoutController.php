<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Frontend.orderForm')->with('product', $product);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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