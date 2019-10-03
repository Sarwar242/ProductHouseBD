@extends('Frontend.master')
@section('contents')
<div class="row">
    @foreach($products as $product)
    <div class="col-sm-4">
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                    <img src="http://placeimg.com/640/320/nature/grayscale" class="img-responsive">
                    <a href="{{route('product.details',$product->id)}}">
                        <div class="card-caption">
                            <span class="h2">{{$product->product_name}}</span>

                        </div>
                    </a>
                </a>
            </div>
            <div class="card-body">
                <div class="price">{{$product->product_price}}/-<small> &nbspeach</small></div>
                <div class="lead">Wrap yourself in luxury</div>
                <ul class="details">
                    <li>A stitch in time saves nine.</li>
                </ul>
                <a href="{{route('product.orderform',$product->id)}}" class="btn btn-primary btn-lg btn-block buy-now">
                    Buy now <span class="glyphicon glyphicon-triangle-right"></span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection