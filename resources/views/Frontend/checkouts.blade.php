@extends('Frontend.layouts.master')
@section('contents')
<div class="container margin-top-20 mb-3">
    <div class="card card-body">
        <h2>Confirm Items</h2>
        <hr>
        <div class="row">
            <div class="col-md-7 border-right">
                @foreach(App\Models\Cart::totalCarts() as $cart)

                <p>
                    {{$cart->product->product_name}}- <strong> {{$cart->product->product_price}}
                        taka
                    </strong>-{{$cart->product_quantity}} item
                </p>
                @endforeach
            </div>
            <div class="col-md-5">

                @php
                $total_price=0;
                @endphp
                @foreach(App\Models\Cart::totalCarts() as $cart)

                @php
                $total_price+=$cart->product->product_price * $cart->product_quantity;
                $total=$total_price+App\Models\Setting::first()->shipping_cost;
                @endphp

                @endforeach

                <p>Total Price: <strong>{{$total_price}}</strong> taka</p>
                <p>Total Price with shipping charge:
                    <strong>{{$total}}</strong> taka</p>
            </div>
        </div>
        <p>
            <a href="{{route('carts')}}">Change Cart Items</a>
        </p>
    </div>

    <div class="card card-body mt-2 mb-4">
        <h2>Shipping Address</h2>
        <hr>

        <form class="" action="{{route('checkout.store')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">
                    Name:
                </label>
                <div class="col-md-6">
                    <input type="text" style="border-radius: 15px !important;" id="name" name="name"
                        class="form-control" value="{{Auth::check() ? Auth::user()->name : ''}}" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">
                    Email:
                </label>
                <div class="col-md-6">
                    <input type="text" style="border-radius: 15px !important;" id="email" name="email"
                        class="form-control" value="{{Auth::check() ? Auth::user()->email : ''}}" required autofocus>


                    @if($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_no" class="col-md-4 col-form-label text-md-right">
                    PhoneNo (*):
                </label>
                <div class="col-md-6">
                    <input type="text" style="border-radius: 15px !important;" id="phone_no" name="phone_no"
                        class="form-control" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-md-4 col-form-label text-md-right">
                    Message (Optional):
                </label>
                <div class="col-md-6">
                    <textarea style="border-radius: 15px !important; resize:none;" name="message" id="message"
                        class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="shipping_address" class="col-md-4 col-form-label text-md-right">
                    Shipping Address (*):
                </label>
                <div class="col-md-6">
                    <textarea style="border-radius: 15px !important; resize:none;" name="shipping_address"
                        id="shipping_address" class="form-control" required></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="payment_method" class="col-md-4 col-form-label text-md-right">
                    Payment Method:
                </label>
                <div class="col-md-6">
                    <select class="form-control appearance" style="border-radius: 15px !important;"
                        name="payment_method" id="payment_method" required>
                        <option value="">Select a Payment Method please</option>
                        @foreach($payments as $payment)
                        <option value="{{$payment->short_name}}">{{$payment->name}}</option>
                        @endforeach
                    </select>
                    @foreach($payments as $payment)

                    @if($payment->short_name=="cash_in")
                    <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center mt-2 hidden"
                        style="margin-left:35px;">
                        <div>
                            <h3>
                                For Cash on Delivery there is nothing necessary.
                                Just click Finish Order.</h3>
                            <br>
                            <small>You will get your product very soon.</small>
                        </div>
                    </div>
                    @else
                    <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center mt-2 hidden"
                        style="margin-left:35px;">
                        <div>
                            <h3>{{$payment->name}} Payment</h3>
                            <p>
                                <strong>{{$payment->name}} No: {{$payment->no}}</strong>
                                <br>
                                <strong>Account Type: {{$payment->type}}</strong>
                            </p>
                            <div class="alert alert-success">
                                Please send the payment to this Number and write transaction code below.
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <input type="text" name="transaction_id" id="transaction_id"
                        style="margin-left:40px !important;width:90% !important;border-radius: 15px !important;"
                        class="form-control hidden" placeholder="Transaction ID">

                </div>
            </div>
            <input class="hidden" type="text" name="cost" value="{{$total}}">
            <div class="form-group row mb-0" style="margin-left:35px;">
                <div class="col-md-6 offset-md-4">
                    <button class="btn btn-primary">
                        Order Now
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
$("#payment_method").change(function() {
    $payment_method = $("#payment_method").val();

    if ($payment_method == "cash_in") {
        $("#payment_cash_in").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").addClass('hidden');
    } else if ($payment_method == "bkash") {
        $("#payment_cash_in").addClass('hidden');
        $("#payment_bkash").removeClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
    } else if ($payment_method == "rocket") {
        $("#payment_rocket").removeClass('hidden');
        $("#payment_cash_in").addClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
    }

});
</script>
@endsection