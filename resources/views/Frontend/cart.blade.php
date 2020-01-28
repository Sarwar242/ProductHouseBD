@extends('Frontend.layouts.master')
@section('contents')
<div class="container margin-top-20">
    <h2>My Cart Items</h2>
    @if(App\Models\Cart::totalItems()>0)
    <div class="container" style="bottom:200px;">
    <table class="table table-hover mt-20">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price(single)</th>
                <th scope="col">SubTotal</th>
                <th scope="col">
                    <span style="padding-left:20%;">Quantity</span>
                </th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total_price=0;
            @endphp
            @foreach(App\Models\Cart::totalCarts() as $cart)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td><a href="{{route('product.details',$cart->product->id)}}">{{$cart->product->product_name}}</a></td>
                <td>
                    @if(!is_null($cart->product->productImages->first()))
                    <img style="width:50px;"
                        src="{{asset('storage')}}/{{$cart->product->productImages->first()->image}}" alt="">
                    @endif
                </td>
                <td>
                    {{$cart->product->product_price}}
                </td>
                <td>
                    {{$cart->product->product_price * $cart->product_quantity}}
                </td>
                @php
                $total_price+= $cart->product->product_price * $cart->product_quantity;
                @endphp
                <td>
                    <form action="{{route('carts.update',$cart->id)}}" class="form-inline" method="post">
                        @csrf
                        <input type="number" onChange="increase()" value="{{$cart->product_quantity}}" style="border-radius: 15px !important;" min="1" max="{{$cart->product->product_quantity}}" name="product_quantity"
                            class="form-control" />
                        <button type="submit" style="border-radius: 15px !important; margin-top:4px;"  class="btn btn-success ml-1">Update</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('carts.delete',$cart->id)}}" class="form-inline" method="post">
                        @csrf
                        <input type="hidden" name="cart_id" />
                        <button  style="border-radius: 15px !important; margin-top:4px;"   type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>

            </tr>
            @endforeach

            <tr>
                <td colspan="2"></td>
                <td colspan="2"> Total Amount:</td>
                <td> {{$total_price}}</td>
            </tr>
        </tbody>
    </table>
    <div class="float-right">
        <a href="{{route('index')}}" class="btn btn-info btn-lg">Continue Shopping</a>
        <a href="{{route('checkout')}}" class="btn btn-warning btn-lg">Checkout</a>
    </div>
    <div class="mb-20" style="height:40px;">

    </div>
</div>
    @else
    <div class="alert alert-warning">
    <strong>There is no item in your cart.</strong>
    <br>
    <a href="{{route('index')}}" class="btn btn-info btn-lg">Continue Shopping</a>
    </div>
    @endif
</div>
@endsection


<script>
function increase(){

}
</script>
