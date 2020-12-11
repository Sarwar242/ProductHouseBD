<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\Payment;
use App\Notifications\OrderPlaced;
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
        $total_price=0;
        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
            $total_price+= $cart->product->product_price * $cart->product_quantity;
        }
        $total_cost=$total_price+$order->shipping_charge-$order->custom_discount;
        if (Auth::check()) {
            Auth::user()->notify(new OrderPlaced($order));
            $fcm_token=Auth::user()->device_token;
            $push_notification_key="AAAACcwonNc:APA91bHyfX9qo8Glhw9IvCXT5Y9m_DxIYjiOz7Np9BYrC0kjfeaH3q1uzpIxv7wBh8SwePz8-AkqEXF26G2gLfqAIdhbhnKLNSq6DjClHxAHSB9KzQgj3RKjKHDxMEpfXlK6OFG-jXiL";
            $url = "https://fcm.googleapis.com/fcm/send";
            $header = array("authorization: key=" . $push_notification_key,
                            "content-type: application/json");

            // $fcm_token ="dKfQYv1cITA-ax_ICDY2Nl:APA91bFsiBIxUvYqbnWrk4obPOXMeqao2WoyeYSqtM8LCpuMvJomIiWfYwbWB_Gbc8dJkCKb_R4k-cC0Zgr1KK_rzmHwP2YPPxAHmxvhERljAXoMm3LqU-c30Hwf0Rc-A5IfI29_5nJP";

            $postdata = '{
                "to" : "' . $fcm_token . '",
                "notification" : {
                    "title":"Your order has been placed!",
                    "body" : "' . $total_cost . '"
                },
                "data" : {
                    "id" : "'.$order->id.'",
                    "name":"'.$order->name.'",
                    "address" : "' . $order->shipping_address . '",
                    "text" : "' . $total_cost. '",
                    "read_at": null
                  }
            }';


        $ch = curl_init();
        $timeout = 120;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        // Get URL content
        $result = curl_exec($ch);
        // close handle to release resources
        curl_close($ch);

        dd($result);
        }


        session()->flash('success_order', 'Your order has taken successfully,
         Please wait Admin will contact you!');

        return redirect()->route('index');

    }
}
