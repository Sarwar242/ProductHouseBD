<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('Frontend.checkouts')
            ->with('payments', $payments);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_no' => 'required',
            'shipping_address' => 'required',
            'payment_method' => 'required',
            'transaction_id' => 'sometimes',
        ]);

        $order = new Order;
        //check transaction id
        if ($request->payment_method != 'cash_in') {
            $order->transaction_id = $request->transaction_id;
            if ($request->transaction_id == null || empty($request->transaction_id)) {
                session()->flash('sticky_error', 'Please give your Transaction Id for your payment confirmation');
                return back();

            }
        }
        $payment_id = Payment::where('short_name', $request->payment_method)
            ->first()->id;

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone_no;
        $order->cost = $request->cost;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->payment_id = $payment_id;
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }
        $order->save();
        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }
        session()->flash('success_order', 'Your order has taken successfully,
         Please wait Admin will contact you!');

        return redirect()->route('index');

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