<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Vengeance | Addon</title>
		<meta charset="UTF-8">
		<meta name="description" content="EndGam Gaming Magazine Template">
		<meta name="keywords" content="endGam,gGaming, magazine, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->
		<link href="img/favicon.ico" rel="shortcut icon"/>
	
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	
		<link href="https://fonts.cdnfonts.com/css/bastamanbold" rel="stylesheet">
		<!-- Stylesheets -->
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/slicknav.min.css"/>
		<link rel="stylesheet" href="css/owl.carousel.min.css"/>
		<link rel="stylesheet" href="css/magnific-popup.css"/>
		<link rel="stylesheet" href="css/animate.css"/>
	
		<!-- Main Stylesheets -->
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
	</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="{{asset('/')}}" class="site-logo">
				<img style="height: 45px;border-radius: 40%; margin-top:-10px;" src="img/logo.webp" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href=""><i class="fa-brands fa-discord" aria-hidden="true" style="margin-right: 15px;"></i></a>
						<a href=""><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="{{asset('/')}}">Home</a></li>
						<li><a href="{{asset('Logs')}}">Logs</a>
						</li>
						<li><a href="review.html">Addons</a></li>
						<li><a href="blog.html">Join Us</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/Addon.jpeg">
		<div class="page-info">
			<h2>Addons</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Addons</span>

			</div>
            <div class="site-breadcrumb">
             @auth
                 <span class="font-bold uppercase" style="font-size:25px;color:white;">You are logged with: <b>{{Auth::user()->name}}</b></span>
                  @endauth
            </div>

            <div class="site-breadcrumb">
            <div class="row">
                <span>

                @auth
				<form action="logout" method="POST">
                    Logout: <a href="{{asset('logout')}}"><i  class="fa-solid fa-door-open" role="button" aria-hidden="true" style="font-size:25px;margin-top:10px;color:white !important;"></i></a>
                </form>
                  Manage addons:<a href="{{asset('Addon/manage')}}"><i class="fa-solid fa-gear" role="button" aria-hidden="true" style="font-size:25px;margin-top:10px;color:white !important;"></i></a>
                  @else
                  Login: <a href="{{asset('login')}}"><i class="fa-solid fa-arrow-right-from-bracket" role="button" aria-hidden="true" style="font-size:25px;margin-top:10px;color:white !important;"></i></a>
                    Register: <a href="{{asset('register')}}"><i class="fa-solid fa-user-plus" role="button" aria-hidden="true" style="font-size:25px;margin-top:10px;color:white !important;"></i></a>
                 @endauth
                </span>
                </div>
            </div>

		</div>
	</section>
	<!-- Page top end-->


	<!-- Review section -->
	<section class="review-section">
		<div class="container">
			<div class="container" style="margin-bottom: 30px;">
				<div class="row">
					<div class="col-lg-4">


					</div>
					<div class="col-lg-4">
                   
				<form action="" method="GET" name="">
					<div class="search-box">
						<button class="btn-search" style="background: rgb(40,57,255);
background: linear-gradient(142deg, rgba(40,57,255,1) 0%, rgba(83,9,121,1) 76%);border: solid 2px white;"><i class="fas fa-search"></i></button>
						<input type="text" class="input-search" placeholder="Type to Search...">
					  </div>
					</form>
                   
				</div>
				<div class="col-lg-4"></div>
			</div>
			</div> 
						@foreach ($listings as $listing)
			
			<div class="review-item">
				<div class="row">
					<div class="col-lg-4">
						<div class="review-pic">
							<img src="{{ $listing->logo ? asset('storage/'. $listing->logo ) : '' }}" alt="">
						</div>
					</div>
					<div class="col-lg-8">
						<div class="review-content text-box text-white">
							<div class="rating">
							<small>{{$listing->created_at}}</small>
							</div>
							<div class="top-meta"><a href=""><div class="top-meta"><x-listing-tags :tagsCsv="$listing->tags" /></div></a></div>
							<h3>{{$listing->title}}</h3>
							<p>{{$listing->description}}</p>
							<a href="Addon/{{$listing['id']}}" class="read-more">Read More  <img src="img/icons/double-arrow.png" alt="#"/></a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
	</section>
	<!-- Review section end-->


	<!-- Newsletter section -->
	<!-- Newsletter section end -->


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="copyright"><a href="">Vengeance</a> 2018 @ All rights reserved</div>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky-sidebar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
