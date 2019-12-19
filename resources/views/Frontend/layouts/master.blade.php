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
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/checkout.css')}}">
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
    <script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}} "></script>

    <script>
    //order validation
    jQuery(document).ready(function() {
        $('.checkbtn1').click(function() {
            var email = $('#checkoutEmail').val();
            var contact = $('#checkoutContact').val();
            var pass_check1 = false;

            if (email == null || email == "" || ((
                    /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
                ).test(email) == false)) {
                pass_check1 = false;
                $('#checkoutEmail').focus();
                $('#checkoutEmail').addClass('error-input');
            } else {
                pass_check1 = true;
                $('#checkoutContact').focus();
                $('#checkoutEmail').removeClass('error-input');
                $('#checkoutEmail').addClass('success-input');

                //pattern for Bangladeshi phone number like +8801951233084 [Not complete]
                // var bd_phone_pattern = "/^(?:\+88|01)?(?:\d{11}|\d{13})$/";
                var bd_phone_pattern = /^(?:\+88|01)?\d{11}$/;

                if (contact == null || contact == "" || bd_phone_pattern.test(contact) != true) {
                    pass_check1 = false;
                    $('#checkoutContact').focus();
                    $('#checkoutContact').addClass('error-input');
                } else {
                    pass_check1 = true;
                    $('#checkoutContact').removeClass('error-input');
                    $('#checkoutContact').addClass('success-input');

                }
            }



            if (pass_check1 != false) {
                //Focus on next div's element and remove hidden class from it.

                // $('#check1').addClass('animated fadeOut');
                $('#check1').addClass('hidden');
                $('#check-one-top').html('<i class="fa fa-check"></i>');
                $('#check-one-top').css({
                    "background-color": "#00BBB5"
                });
                $('#check-two-top').css({
                    "background-color": "#004C48"
                });
                $('#check2').removeClass('hidden');
                $('#check2').show('slow');
                $('#shipping_name').focus();
            }

        });



        //Onclick Check button 2
        $('.checkbtn2').click(function() {
            var shipping_name = $('#shipping_name').val();
            var shipping_contact = $('#shipping_contact').val();
            var shipping_primary_address = $('#shipping_primary_address').val();
            var shipping_secondary_address = $('#shipping_secondary_address').val();
            var shipping_nearest_city = $('#shipping_nearest_city').val();
            var pass_check2 = false;
            if (shipping_name === null || shipping_name === "") {
                $('#shipping_name').focus();
                $('#shipping_name').addClass('error-input');
            } else {
                $('#shipping_name').addClass('success-input');
                if (shipping_contact === null || shipping_contact === "") {
                    $('#shipping_name').focus();
                    $('#shipping_name').addClass('error-input');
                } else {
                    $('#shipping_contact').addClass('success-input');
                    if (shipping_primary_address === null || shipping_primary_address === "") {
                        $('#shipping_primary_address').focus();
                        $('#shipping_primary_address').addClass('error-input');
                    } else {

                        $('#shipping_primary_address').addClass('success-input');
                        $('#shipping_secondary_address').addClass('success-input');
                        if (shipping_nearest_city === null || shipping_nearest_city === "") {
                            $('#shipping_nearest_city').focus();
                            $('#shipping_nearest_city').addClass('error-input');
                        } else {
                            pass_check2 = true;
                        }
                    }
                }
            }



            if (pass_check2 != false) {
                $('#check2').addClass('hidden');
                $('#check-two-top').html('<i class="fa fa-check"></i>');
                $('#check-two-top').css({
                    "background-color": "#00BBB5"
                });
                $('#check-three-top').css({
                    "background-color": "#004C48"
                });
                $('#check3').removeClass('hidden');
                $('#check3').show('slow');
                $('#payments').focus();
            }


        });


        $('.backToCheck1').click(function() {
            pass_check1 = false;
            $('#check1').removeClass('hidden');
            $('#check2').addClass('hidden');

            $('#check-one-top').html('1');
            $('#check-one-top').css({
                "background-color": "#004C48"
            });
            $('#check-two-top').css({
                "background-color": "#00BBB5"
            });
        });

        $('.backToCheck2').click(function() {
            pass_check2 = false;
            $('#check2').removeClass('hidden');
            $('#check3').addClass('hidden');

            $('#check-two-top').html('1');
            $('#check-two-top').css({
                "background-color": "#004C48"
            });
            $('#check-three-top').css({
                "background-color": "#00BBB5"
            });
        });


        // $('.inputs').keydown(function(e) {
        //     if (e.which === 13) {
        //         var index = $('.inputs').index(this) + 1;
        //         $('.inputs').eq(index),focus();
        //     }
        // });

        // Onclick Payment select option payment list will apear

        $('#payments').change(function() {
            var payment_method = $('#payments').val();

            if (payment_method === "payment_paypal") {
                $('.payment-div-paypal').removeClass('hidden');
                $('.payment-div-paypal').addClass('animated slideInLeft');
                $('.payment-div-bkash').addClass('hidden');
                $('.payment-div-stripe').addClass('hidden');
            }
            if (payment_method === "payment_stripe") {
                $('.payment-div-stripe').removeClass('hidden');
                $('.payment-div-stripe').addClass('animated slideInUp');
                $('.payment-div-paypal').addClass('hidden');
                $('.payment-div-bkash').addClass('hidden');
            }
            if (payment_method === "payment_bkash") {
                $('.payment-div-bkash').removeClass('hidden');
                $('.payment-div-bkash').addClass('animated slideInRight');
                $('.payment-div-paypal').addClass('hidden');
                $('.payment-div-stripe').addClass('hidden');
            }

        });


    });

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
    <script type="text/javascript" src="{{asset('js/wow.min.js')}} "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="{{asset('js/webslidemenu.js')}} "></script>
    <script type="text/javascript" src="{{asset('js/main.js')}} "></script>

</body>

</html>