@extends('Frontend.layouts.master')
@section('contents')
<div class="content-area">
    <div class="container">
        <h3>Order Info</h3>
        <br>
        <div class="form-group" style="display:inline-flex">
            <label class="control-label col-sm-2" for="shipping_name">Name: </label>
            <div class="col-sm-10">
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp {{$order->name}}
            </div>
        </div>
        <br>
        <div class="form-group" style="display:inline-flex">
            <label class="control-label col-sm-2" for="shipping_primary_address">Shipping Address:</label>
            <div class="col-sm-10">
                &nbsp &nbsp &nbsp &nbsp &nbsp{{$order->shipping_address }}
            </div>
        </div>
        <br>
        <div class="form-group" style="display:inline-flex">
            <label class="control-label col-sm-2" for="shipping_primary_address">Price:</label>
            <div class="col-sm-10">
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{$product->product_price}}
            </div>
        </div>
        <br>
        <div class="form-group" style="display:inline-flex">
            <label class="control-label col-sm-2" for="shipping_primary_address">Payment:</label>
            <div class="col-sm-10">
                &nbsp &nbsp &nbsp &nbsp &nbspPlease pay: {{$product->product_price - $product->product_discount}}
                taka [With Discount] <br> to 01765487478(send money) with Bkash.
            </div>
        </div>
        <br>
        <div class="form-group" style="display:inline-flex">
            <label class="control-label col-sm-2" for="shipping_primary_address">Note:</label>
            <div class="col-sm-10">
                &nbsp &nbspAdmin will contact you soon thankyou.!
            </div>
        </div>

    </div> <!-- End check2 -->
</div>
<!--End Checkout page -->
</div> <!-- End Container -->


@endsection