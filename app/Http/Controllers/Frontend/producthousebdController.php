<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

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
    public function confirmOrder($id)
    {
        $product = Product::find($id);
        return view('Frontend.confirmationPage')->with('product', $product);
    }
}