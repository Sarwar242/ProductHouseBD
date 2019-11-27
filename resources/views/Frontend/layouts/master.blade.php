<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CosmolineBD</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript">
    </script>

</head>

<body>
    <div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>

            <img src="{{ asset('frontend/logo/cosmolinelogo.png') }}" class="logo">
            <input type="text" class="form-control">
            <span class="input-group-text"><i class="fa fa-search"></i>
            </span>
        </div>
        <div class="menu-bar">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-shopping-basket"></i>Cart</a>
                </li>
                <li>
                    <a href="#">Sign Up</a>
                </li>
                <li>
                    <a href="#">Login</a>
                </li>
            </ul>
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
                   <div class="col-md-3 footer-image" >
                    <h1>Download App</h1>
                    <img src="{{ asset('frontend/images/playdownload.png') }}">
                </div>
            </div>
            <hr>
            <p class="copyright">Developed By Sarwar&nbsp; <i class="fa fa-heart-o"></i> </p>
        </div>
    </section>



        <script>
        function openmenu(){
            document.getElementById("side-menu").style.display="block";
            document.getElementById("menu-btn").style.display="none";
            document.getElementById("close-btn").style.display="block";
        }
        function closemenu(){
            document.getElementById("side-menu").style.display="none";
            document.getElementById("menu-btn").style.display="block";
            document.getElementById("close-btn").style.display="none";
        }


        </script>
    </body>
</html>
