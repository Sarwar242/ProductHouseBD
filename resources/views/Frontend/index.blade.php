@extends('Frontend.master')
@section('contents')
<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
<div class="imageintro">
    <img style="opacity:30%; height:300px;" src="{{asset('images/cover.png')}}">
</div>
<div class="content">
@foreach($products as $product)
    <div class="card">
        <div class="card-body">
            <a href="{{route('product.details',$product->id)}}">{{$product->product_name}}</a>
            <p>{{$product->product_price}}</p>
        </div>
    </div>
    @endforeach
    </div>
@endsection
