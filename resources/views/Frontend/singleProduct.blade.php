@extends('Frontend.layouts.master')
@section('contents')
<!----------------------------Single Product------------------------>
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">

                        @foreach($product->productImages as $productImage)

                        @if($loop->index==0)
                        <div class="carousel-item active" style="max-width:350px; max-height:350px;">
                            <img style="padding:2px; width:100%;" src="{{ asset('storage')}}/{{$productImage->image}}"
                                class="d-block">
                        </div>
                        @else
                        <div class="carousel-item" style="max-width:350px; max-height:250px;">
                            <img style="padding:2px;  width:100%;" src="{{ asset('storage')}}/{{$productImage->image}}"
                                class="d-block">
                        </div>
                        @endif
                        <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <p class="new-arrival text-center">NEW</p>
                <h2>{{$product->product_name}}</h2>
                <p>{{$product->product_code}}</p>

                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>

                <p class="price"><b>Price:</b> {{$product->product_price}} <b>Taka</b></p>
                @if($product->product_quantity>0)
                <p><b>Availability:</b> In Stock({{$product->product_quantity}})</p>
                @else
                <p><b>Availability:</b>Out of Stock!</p>
                @endif
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> XYZ Company</p>
                <!-- <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" placeholder="1" min="1" max="{{$product->product_quantity}}"> -->
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type="button" class="btn btn-secondary" title="Add to Cart"
                    onclick="addToCart({{$product->id}});"><i class="fa fa-shopping-cart"></i></button>
                <a href="{{route('product.orderform',$product->id)}}" class="btn btn-success">Buy Now</a>
            </div>
        </div>
    </div>
</section>
<!-----------------------Product Description---------------------->
<section class="product-description">
    <div class="container">
        <h6>Product Description:</h6><br>
        <p>{{$product->product_details}}</p>
        <hr>
    </div>

    <div class="container">
        <div class="title-box">
            <h2>Similar</h2>
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