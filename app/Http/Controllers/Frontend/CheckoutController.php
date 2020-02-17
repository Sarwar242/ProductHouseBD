<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
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
        $cities = City::all();
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('Frontend.checkouts')
            ->with('payments', $payments)
            ->with('cities', $cities);

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
            'email' => 'required',
            'city_id' => 'required',
            'shipping_address' => 'required',
            'shipping_charge' => 'required',
            'payment_method' => 'required',
            'transaction_id' => 'sometimes',
            'message' => 'sometimes',
        ]);

        $order = new Order;
        //check transaction id
        if ($request->payment_method != 'cash_on_delivery') {
            $order->transaction_id = $request->transaction_id;
            if ($request->transaction_id == null || empty($request->transaction_id)) {
                session()->flash('message', 'Please give your Transaction Id for your payment confirmation');
                return back();

            }
        }
        $payment_id = Payment::where('short_name', $request->payment_method)
            ->first()->id;

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone_no;
        $order->city_id = $request->city_id;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_charge = $request->shipping_charge;
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
}