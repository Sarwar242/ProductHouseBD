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
                        <div class="carousel-item active">
                            <img src="{{ asset('storage')}}/{{$productImage->image}}" class="d-block">
                        </div>

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
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> XYZ Company</p>
                <label for="quantity">Quantity:</label>
                <input type="text" value="1">
                <button type="button" class="btn btn-primary">Add to Cart</button>
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
            <div class="col-md-3">
                <div class="product-top">
                    <img src="images/headphone2.jpg">
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop"><i
                                class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Wish List"><i
                                class="fa fa-heart-o"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Cart"><i
                                class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <h3>Head Phone</h3>
                    <h5>$40.00</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-top">
                    <img src="images/cosmo5.jpg">
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop"><i
                                class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Wish List"><i
                                class="fa fa-heart-o"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Cart"><i
                                class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3>Face Wash</h3>
                    <h5>$10.00</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-top">
                    <img src="images/watch2.jpg">
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop"><i
                                class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Wish List"><i
                                class="fa fa-heart-o"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Cart"><i
                                class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3>Watch</h3>
                    <h5>$50.00</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-top">
                    <img src="images/shoe2.jpg">
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop"><i
                                class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Wish List"><i
                                class="fa fa-heart-o"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Cart"><i
                                class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                    <h3>Sports Shoe</h3>
                    <h5>$550.00</h5>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection