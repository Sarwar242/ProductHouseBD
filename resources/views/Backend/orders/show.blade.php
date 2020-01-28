@extends('Backend.layouts.admin_design')
@section('act4')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('homeadmin')}}
" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> > <a href="#">Order</a> > <a href="#" class="current">Show Order</a> </div>
        <h1>#CSL{{$order->id}}</h1>

        @if(Session::has('flash_message_error'))

        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">
                x
            </button>
            <strong>
                {!! session('flash_message_error') !!}
            </strong>
        </div>

        @endif
        @if(Session::has('flash_message_success'))

        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">
                x
            </button>
            <strong>
                {!! session('flash_message_success') !!}
            </strong>
        </div>

        @endif
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>View Order: CSL{{$order->id}}</h5>
                    </div>

                    <div class="widget-content">
                        <h3>Order Informations</h3>
                        <div class="row" style="display:flex; margin:40px;">
                            <div class="col-md-6" style="margin-right:100px;">
                                <p><strong>Orderer Name: </strong>{{$order->name}}.</p>
                                <p><strong>Orderer Phone: </strong>{{$order->phone}}.</p>
                                <p><strong>Orderer Email: </strong>{{$order->email}}.</p>
                                <p><strong>Orderer Shipping Address: </strong>{{$order->shipping_address}}.</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Order Total Cost: </strong>{{$order->cost}} .</p>
                                <p><strong>Order Payment Method: </strong>{{$order->payment->name}} .</p>
                                <p><strong>Order Payment Transaction: </strong>{{$order->transaction_id}} .</p>
                            </div>
                        </div>
                        <div class="widget-content nopadding">
                            <h3>Ordered Items:</h3>
                            @if($order->carts->count()>0)
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>SubTotal</th>
                                        <th>Quantity</th>
                                        <th>Action(s)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $total_price=0;
                                    @endphp

                                    @foreach($order->carts as $cart)

                                    <tr class="gradeX">
                                        <td scope="row">{{$loop->index+1}}</td>
                                        <td><a
                                                href="{{route('product.details',$cart->product->id)}}">{{$cart->product->product_name}}</a>
                                        </td>
                                        <td>
                                            @if(!is_null($cart->product->productImages->first()))
                                            <img style="width:50px;"
                                                src="{{asset('storage')}}/{{$cart->product->productImages->first()->image}}"
                                                alt="">
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
                                            <form action="{{route('carts.update',$cart->id)}}" class="form-inline"
                                                method="post">
                                                @csrf
                                                <input type="number" value="{{$cart->product_quantity}}"
                                                    style="border-radius: 15px !important;" min="1"
                                                    max="{{$cart->product->product_quantity}}" name="product_quantity"
                                                    class="form-control" />
                                                <button type="submit"
                                                    style="border-radius: 15px !important; margin-top:4px;"
                                                    class="btn btn-success ml-1">Update</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.order.delete',$order->id)}}"
                                                class="form-inline" method="post">
                                                @csrf
                                                <input type="hidden" name="cart_id" />
                                                <button style="border-radius: 15px !important; margin-top:4px;"
                                                    type="submit" class="btn btn-danger">Remove</button>
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
                            @endif

                            <hr>

                            <form style="display:inline-block !important;"
                                action="{{route('admin.order.completed',$order->id)}}" method="post">
                                @csrf
                                @if($order->order_status==0)
                                <input type="submit" value="Complete Order" class="btn btn-success">
                                @else
                                <input type="submit" value="Completed Order" class="btn btn-danger">
                                @endif
                            </form>
                            <form style="display:inline-block !important;"
                                action="{{route('admin.order.paid',$order->id)}}" method="post">
                                @csrf
                                @if($order->is_paid==0)
                                <input type="submit" value="Paid Order" class="btn btn-success">
                                @else
                                <input type="submit" value="Unpaid Order" class="btn btn-danger">
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection