<!DOCTYPE html>
<html>
<head>
	 <title>@yield('title', 'ProductHouse BD')</title>
	
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
	<link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
	<link rel="icon" href="{{asset('images/producthousebdicon.png')}}">
	<meta charset="utf-8">
</head>
<body>



<nav class="navbar cusnav navbar-default sticky">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img class="cusnamimg" src="{{asset('images/producthousebdLogo.png')}}"></a>
    </div><br>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav cuslia">
        <li class="active"><a href="#">হোম <span class="sr-only">(current)</span></a></li>
        <li><a href="#">কসমেটিক্স</a></li>
        <li><a href="#">এক্সেসোরিজ</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right cuslia">
        <li><a href="#">Cart</a></li>
        <li><a href="#">Login/Registration</a></li>
        
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="container" >




        @yield('contents')


    </div>

<br><br>
    <footer>

        <!-- Copyright -->

        <div class="footerpp">
            <p>© 2019 Copyright : ProductHouse BD. Developed by Pranta. </p>
        </div>


    </footer>

    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}} "></script>


</body>
</html>