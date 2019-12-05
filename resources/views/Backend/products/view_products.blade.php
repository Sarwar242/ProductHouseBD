@extends('Backend.layouts.admin_design')
@section('act3')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">View Products</a> </div>
        <h1>Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Products List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Products Serial</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $i=0; @endphp
                                @foreach($products as $product)
                                @php $i++; @endphp
                                <tr class="gradeX">
                                    <td>{{$i}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_details}}</td>
                                    <td>{{$product->product_price}}</td>
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