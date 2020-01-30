<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class producthousebdController extends Controller
{

    public function index()
    {
        $product = Product::all();
        $categories = Category::all();
        $sliders = Slider::orderBy('priority', 'asc')->get();
        $users = DB::table('users');
        $new = Product::orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('Frontend.index')->with('products', $product)
            ->with('categories', $categories)->with('new', $new)
            ->with('sliders', $sliders);
    }
    public function productDetails($id)
    {
        $product = Product::find($id);
        $cid = $product->category->id;
        $products = Product::where('category_id', '=', $cid)
            ->orderBy('created_at')
            ->get();

        return view('Frontend.singleProduct')
            ->with('product', $product)->with('products', $products);
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
        $order->is_paid = 0;
        $order->order_status = 0;

        $order->save();

        $order = Order::find(Auth::user()->id);
        return view('Frontend.confirmationPage')
            ->with('product', $product)
            ->with('order', $order);
    }

    public function category($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('Frontend.category')
            ->with('category', $category)
            ->with('categories', $categories);

    }

    public function subcategory($id)
    {
        $subcategory = Subcategory::find($id);

        return view('Frontend.subcategory')
            ->with('subcategory', $subcategory);

    }

}