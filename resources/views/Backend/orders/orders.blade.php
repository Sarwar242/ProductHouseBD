@extends('Backend.layouts.admin_design')
@section('act4')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">View Orders</a> </div>
        <h1>Orders</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Orders List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Shipping Address</th>
                                    <th>Nearest City</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $i=0; @endphp
                                @foreach($orders as $order)
                                @php $i++; @endphp
                                <tr class="gradeX">
                                    <td style="width:50px;">{{$i}}</td>

                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                    <td>{{$order->nearest_city}}</td>
                                    <td>{{$order->payment_method }}</td>
                                    <td>{{$order->is_paid }}</td>
                                    <td>{{$order->order_status }}</td>
                                    <td class="center"> <a href="#" class="btn btn-primary btn-mini">Edit</a> <a
                                            href="#" class="btn btn-danger btn-mini">Delete</a></td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection