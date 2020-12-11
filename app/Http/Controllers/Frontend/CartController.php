<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['update', 'destroy']);
    }
    public function index()
    {
        // $cart=Cart::totalCarts();
        return view('Frontend.cart');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'product_id' => 'required',
        ]);
        $check = Cart::Where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('order_id', null)
            ->first();

        if (!is_null($check)):
            $check->increment('product_quantity');
        else:
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->ip_address = request()->ip();
            $cart->save();
        endif;

        return json_encode(['status' => 'success',
            'message' => 'Item has been added',
            'totalItems' => Cart::totalItems()]);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
            // if (!is_null($cart->order_id)) {
            //     $quantity = Cart::where('order_id', $request->order_id)->get();

            // }

        } else {
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart Item Updated Successfully');
        return back();

    }
    public function destroy(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->delete();
        } else {
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart Item Deleted Successfully');
        return back();

    }
}