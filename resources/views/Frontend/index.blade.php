@extends('Frontend.layouts.master')
@section('contents')
<section class="header">
    <div class="side-menu" id="side-menu">
        <ul>
            <li>On Sale<i class="fa fa-angle-right"></i>
                <ul>
                    <li>Submenu 1</li>
                    <li>Submenu 1</li>
                    <li>Submenu 1</li>
                </ul>
            </li>
            <li>Mobiles<i class="fa fa-angle-right"></i>
                <ul>
                    <li>Submenu 2</li>
                    <li>Submenu 2</li>
                    <li>Submenu 2</li>
                </ul>
            </li>

            <li>Computers<i class="fa fa-angle-right"></i>
                <ul>
                    <li>Submenu 3</li>
                    <li>Submenu 3</li>
                    <li>Submenu 3</li>
                </ul>
            </li>

            <li>Accessories<i class="fa fa-angle-right"></i>
                <ul>
                    <li>Submenu 4</li>
                    <li>Submenu 4</li>
                    <li>Submenu 4</li>
                </ul>
            </li>

            <li>Cosmetics<i class="fa fa-angle-right"></i>
                <ul>
                    <li>Submenu 5</li>
                    <li>Submenu 5</li>
                    <li>Submenu 5</li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="slider">
        <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('frontend/images/slide1.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/slide2.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/slide3.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/slide4.jpg') }}" class="d-block w-100">
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
                <li data-target="#slider" data-slide-to="3"></li>
            </ol>
        </div>
    </div>

</section>


<!--------------------featured-categories------------------------>
<section class="featured-categories">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <img src="images/airpods.jpg">
            </div>
            <div class="col-md-4">
                <img src="images/cosmo2.jpg">
            </div>
            <div class="col-md-4">
                <img src="images/smwatch.jpg">
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
            <div class="col-md-3">
                <div class="product-top">
                    <a href="product.html"> <img src="images/headphone2.jpg"></a>
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
                    <a href="product.html"> <img src="images/cosmo5.jpg"></a>
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
                    <a href="product.html"> <img src="images/watch2.jpg"></a>
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
                    <a href="product.html"> <img src="images/shoe2.jpg"></a>
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


<!------------------New Products------------------->
<section class="new-products">
    <div class="container">
        <div class="title-box">
            <h2>New Arrivals</h2>
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


<!----------------------------Website Features------------------------>

<section class="website-features">
    <div class="container">
        <div class="row">
            <div class="col-md-3 feature-box">
                <img src="images/cosmo.jpg">
                <div class="feature-text">
                    <p><b>100% Original Items</b> are available.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="images/shoe.jpg">
                <div class="feature-text">
                    <p><b>Easy Payment</b> method [Bkash].</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="images/airpods.jpg">
                <div class="feature-text">
                    <p><b>Quick Delivery</b> within given time.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="images/watch.jpg">
                <div class="feature-text">
                    <p><b>Quick Response</b> for any query.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection