<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'ProductHouse BD')</title>

    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/checkout.css')}}">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}} "></script>

    <link rel="icon" href="{{asset('images/producthousebdicon.png')}}">
    <meta charset="utf-8">
</head>

<body>



    <nav class="navbar cusnav navbar-default sticky">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img class="cusnamimg" src="{{asset('images/logo5.png')}}"></a>
            </div><br>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav cuslia">
                    <li class="active"><a href="{{route('index')}}">হোম <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">কসমেটিক্স</a></li>
                    <li><a href="#">এক্সেসোরিজ</a></li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default"><span
                            class="glyphicon glyphicon-search"></span></button>
                </form>
                <ul class="nav navbar-nav navbar-right cuslia">
                    <li><a href="#">Cart</a></li>
                    <li><a href="{{route('login')}}">Login/Registration</a></li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>



    <div style="margin-top:200px" class="container">




        @yield('contents')


    </div>

    <br><br>
    <footer>

        <!-- Copyright -->

        <div class="footerpp">
            <p>© 2019 Copyright : ProductHouse BD. Developed by Pranta. </p>
        </div>


    </footer>

    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}} "></script>
    <script type="text/javascript">
    //Scripts for checkout functions one by one input fields.
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
    </script>
    <script type="text/javascript" src="{{asset('js/wow.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('js/webslidemenu.js')}} "></script>
    <script type="text/javascript" src="{{asset('js/main.js')}} "></script>
</body>

</html>