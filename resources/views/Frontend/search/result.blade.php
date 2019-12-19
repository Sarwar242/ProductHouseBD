@extends('Frontend.layouts.master')
@section('contents')


<section class="on-sale">
    <div class="container">
        <div class="card">
            <h3>Result for: &nbsp&nbsp &nbsp{{$search}}</h3>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="product-top">
                    @foreach($product->productImages as $productImage)
                    <a href="{{route('product.details',$product->id)}}"> <img
                            src="{{ asset('storage')}}/{{$productImage->image}}"></a>
                    @break
                    @endforeach
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop"><i class="fa fa-eye"
                                onclick="window.location.href = '{{route('product.orderform',$product->id)}}';"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Wish List"><i
                                class="fa fa-heart-o"></i></button>


                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="button" class="btn btn-secondary" title="Add to Cart"
                            onclick="addToCart({{$product->id}});"><i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <h3>{{$product->product_name}}</h3>
                    <h5>{{$product->product_price}}</h5>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection