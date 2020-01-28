@extends('Backend.layouts.admin_design')
@section('act4')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('homeadmin')}}
" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> > <a href="#">Orders</a> </div>
        <h1>Orders</h1>

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
                        <h5>Orders List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table id="dataTable" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Order ID</th>
                                    <th>Orderer Name</th>
                                    <th>Orderer Phone No</th>
                                    <th>Order Status</th>
                                    <th>Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($orders as $order)

                                <tr class="gradeX">
                                    <td style="width:50px;">{{$loop->index+1}}</td>

                                    <td>#csl{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td class=" center" style="display:flex;">

                                        <p>@if($order->is_paid)
                                            <button type="button" class="btn btn-success btn-mini"
                                                style="margin:2px;">Paid</button>
                                            @else
                                            <button type="button" style="margin:2px;"
                                                class="btn btn-danger btn-mini">Unpaid</button>
                                            @endif
                                        </p>
                                        <p>@if($order->order_status)
                                            <button type="button" style="margin:2px;"
                                                class="btn btn-success btn-mini">Completed</button>
                                            @else
                                            <button type="button" style="margin:2px;"
                                                class="btn btn-warning btn-mini">Incomplete</button>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="center">
                                        <a href="{{route('admin.order.show',$order->id)}}"
                                            class="btn btn-info btn-mini">View</a>
                                        <a href="{{route('admin.order.delete2',$order->id)}}"
                                            data-confirm="Are you sure to delete this Order?"
                                            class="delete btn btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Order ID</th>
                                    <th>Orderer Name</th>
                                    <th>Orderer Phone No</th>
                                    <th>Order Status</th>
                                    <th>Action(s)</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection