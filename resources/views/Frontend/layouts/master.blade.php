<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CosmolineBD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}?ver=1.1">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />


    <script type="text/javascript" src="{{asset('js/jquery.min.js')}} "></script>



</head>

<body>
    <div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>

            <img src="{{ asset('frontend/logo/cosmoline.png') }}" class="logo"
                onclick="window.location.href = '{{route('index')}}';">


            <form id="sea" class="form-control" action="{{ route('search') }}" method="get">
                @csrf
                <input type="text" name="search" class="form-input">
            </form>

            <span class="input-group-text" onclick="event.preventDefault();
                                                     document.getElementById('sea').submit();"><i
                    class="fa fa-search"></i>

            </span>

        </div>
        <div class="menu-bar">
            @if (Route::has('login'))
            <ul>
                @auth
                <li>
                    <a href="{{route('carts')}}"><i class="fa fa-shopping-basket"></i>Cart&nbsp
                        <span class="badge badge-light" id="totalItems">
                            {{App\Models\Cart::totalItems()}}</span></a>
                </li>
                <li class="dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        onclick="window.location.href = '{{route('user.profile',Auth::user()->id)}}';" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="color:black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">Sign Up</a>
                </li>
                @endif
                @endauth
            </ul>
            @endif
        </div>
    </div>
    @yield('contents')
    <!----------------------------Footer------------------------>

    <section class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3">
                    <h1>Useful Links</h1>
                    <p>Privacy Policy</p>
                    <p>Terms of Use</p>
                    <p>Return Policy</p>
                    <p>Discount Coupons</p>
                </div>
                <div class="col-md-3">
                    <h1>Company</h1>
                    <p>About Us</p>
                    <p>Contact Us</p>
                    <p>Career</p>
                    <p>Affiliate</p>
                </div>
                <div class="col-md-3">
                    <h1>Follow Us On</h1>
                    <p><i class="fa fa-facebook-official"></i>Facebook</p>
                    <p><i class="fa fa-youtube-play"></i>YouTube</p>
                    <p><i class="fa fa-linkedin"></i>Linkedin</p>
                    <p><i class="fa fa-twitter"></i>Twitter</p>
                </div>
                <div class="col-md-3 footer-image">
                    <h1>Download App</h1>
                    <img src="{{ asset('frontend/images/playdownload.png') }}">
                </div>
            </div>
            <hr>
            <p class="copyright">Developed By Sarwar&nbsp; <i class="fa fa-heart-o"></i> </p>
        </div>
    </section>
    @yield('script')
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(product_id) {
        $.post("/carts/store", {
                product_id: product_id
            })
            .done(function(data) {
                data = JSON.parse(data);
                if (data.status == 'success') {

                    $("#totalItems").html(data.totalItems);

                    alertify.set('notifier', 'position', 'top-center');

                    alertify.success('Added to Cart! To checkout goto checkout page');

                }
            });
    }
    </script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    function openmenu() {
        document.getElementById("side-menu").style.display = "block";
        document.getElementById("menu-btn").style.display = "none";
        document.getElementById("close-btn").style.display = "block";
    }

    function closemenu() {
        document.getElementById("side-menu").style.display = "none";
        document.getElementById("menu-btn").style.display = "block";
        document.getElementById("close-btn").style.display = "none";
    }
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="{{asset('js/main.js')}} "></script>

</body>

</html>