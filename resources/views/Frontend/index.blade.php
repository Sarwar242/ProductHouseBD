@extends('Frontend.layouts.master')


@section('contents')
<section class="header">
    @include('Frontend.layouts.sidemenu')
    <div class="slider">
        <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                <div class="carousel-item {{$loop->index==0 ? 'active' : ''}}">
                    <img src="{{ asset('storage')}}/{{$slider->image}}" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        @if(!is_null($slider->button_link))
                        <h5 onclick="window.open( '{{$slider->button_link}}' );">{{$slider->title}}</h5>
                        <p onclick="window.open( '{{$slider->button_link}}' );">
                            {{$slider->button_text}}</p>
                        @else
                        <h5 onclick="window.location.href = '{{route('product.details',$slider->product_id)}}';">
                            {{$slider->title}}</h5>
                        <p onclick="window.location.href = '{{route('product.details',$slider->product_id)}}';">
                            Click here</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                <li data-target="#slider" data-slide-to="{{$loop->index}}" class="{{$loop->index==0 ? 'active' : ''}}">
                </li>
                @endforeach
            </ol>
        </div>
    </div>

</section>


<!--------------------featured-categories------------------------>
<section class="featured-categories">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('frontend/images/airpods.jpg')}}">
            </div>
            <div class="col-md-4">
                <img src="{{asset('frontend/images/cosmo2.jpg')}}">
            </div>
            <div class="col-md-4">
                <img src="{{asset('frontend/images/smwatch.jpg')}}">
            </div>
        </div>
    </div>

</section>


<!---------------On Sale Product------------------->

<section class="on-sale">
    <div class="container">
        <div class="title-box">
            <h2>On Sale</h2>
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


<!------------------New Products------------------->
<section class="new-products">
    <div class="container">
        <div class="title-box">
            <h2>New Arrivals</h2>
        </div>
        <div class="row">
            @foreach($new as $new)
            <div class="col-md-3">
                <div class="product-top">
                    @foreach($new->productImages as $productImage)
                    <a href="{{route('product.details',$new->id)}}"> <img
                            src="{{ asset('storage')}}/{{$productImage->image}}"></a>
                    @break
                    @endforeach
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop"><i class="fa fa-eye"
                                onclick="window.location.href = '{{route('product.orderform',$new->id)}}';"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to Wish List"><i
                                class="fa fa-heart-o"></i></button>


                        <input type="hidden" name="product_id" value="{{$new->id}}">
                        <button type="button" class="btn btn-secondary" title="Add to Cart"
                            onclick="addToCart({{$new->id}});"><i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <h3>{{$new->product_name}}</h3>
                    <h5>{{$new->product_price}}</h5>

                </div>
            </div>
            @endforeach

        </div>
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
{{-- @if(Session::has('success_order'))
<script type="text/javascript">
alertify.set('notifier', 'position', 'top-center');
alertify.success('Your order has taken successfully ,Please wait Admin will contact you!');
</script>
@endif --}}
@endsection
