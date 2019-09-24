@extends('Frontend.master')
@section('contents')
<div class="content">
    <div class="card-body">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>{{$product->product_name}}
        </h1>
        <h2>{{$product->product_details}}
        </h2>
        <h2>{{$product->product_price}}
        </h2>
        <h3>{{$product->product_code}}
        </h3>
        <form action="{{route('product.order.confirm',$product->id)}}" method="get" class="form">
            <button class="btn btn-success" type="submit">Confirm Order</button>
        </form>
    </div>
</div>
@endsection