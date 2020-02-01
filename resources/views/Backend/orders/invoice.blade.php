<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>View Order: CSL{{$order->id}}</h5>
                        </div>

                        <div class="widget-content">
                            <h3>Order Informations</h3>
                            <div class="row">
                                <div class="col-md-6" style="margin-right:100px;">
                                    <p><strong>Orderer Name: </strong>{{$order->name}}.</p>
                                    <p><strong>Orderer Phone: </strong>{{$order->phone}}.</p>
                                    <p><strong>Orderer Email: </strong>{{$order->email}}.</p>
                                    <p><strong>Orderer Shipping Address: </strong>{{$order->shipping_address}}.</p>

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

                                            <th>Price</th>
                                            <th>SubTotal</th>
                                            <th>Quantity</th>

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
                                                {{$cart->product->product_price}}
                                            </td>
                                            <td>
                                                {{$cart->product->product_price * $cart->product_quantity}}
                                            </td>
                                            <td>
                                                {{$cart->product->product_quantity}}
                                            </td>
                                            @php
                                            $total_price+= $cart->product->product_price * $cart->product_quantity;
                                            @endphp


                                        </tr>
                                        @endforeach
                                        <hr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2"> Total Amount:</td>
                                            <td> {{$total_price}}</td>
                                        </tr>
                                        <hr>
                                    </tbody>
                                </table>

                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>