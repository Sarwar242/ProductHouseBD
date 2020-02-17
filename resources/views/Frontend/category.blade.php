@extends('Frontend.layouts.master')
@section('contents')


<!---------------On Sale Product------------------->
@include('Frontend.layouts.sidemenu')
<section class="on-sale">
    <div class="container">
        <div class="title-box">
            <h2>{{$category->name}}</h2>
        </div>
        <h4>--------------------------------------------------------------------------------------------------------------------------------
        </h4>

        @foreach($category->subcategories as $subcategory)
        <div class="title-box2">
            <h4 onclick="window.location.href = '{{route('subcategory',$subcategory->id)}}';">{{$subcategory->name}}
            </h4>
        </div>
        <div class="row">
            @foreach($subcategory->products as $product)
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
        @endforeach
    </div>
</section>


<!----------------------------Website Features------------------------>

<section class="website-features">
    <div class="container">
        <div class="row">
            <div class="col-md-3 feature-box">
                <img src="{{asset('frontend/images/cosmo.jpg')}}">
                <div class="feature-text">
                    <p><b>100% Original Items</b> are available.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="{{asset('frontend/images/payment.jpg')}}">
                <div class="feature-text">
                    <p><b>Easy Payment</b> method [Bkash].</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="{{asset('frontend/images/airpods.jpg')}}">
                <div class="feature-text">
                    <p><b>Quick Delivery</b> within given time.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="{{asset('frontend/images/watch.jpg')}}">
                <div class="feature-text">
                    <p><b>Quick Response</b> for any query.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection