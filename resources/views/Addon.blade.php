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
				<a href="home.html" class="site-logo">
					<img style="height: 40px;border-radius: 40%;" src="img/logo.webp" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href=""><i class="fa-brands fa-discord" aria-hidden="true" style="margin-right: 15px;"></i></a>
						<a href=""><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="index.html">Home</a></li>
						<li><a href="games.html">Logs</a>
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
		</div>
	</section>
	<!-- Page top end-->


	<!-- Review section -->
	<section class="review-section">
		<div class="container">
			<div class="container" style="margin-bottom: 30px;">
				<div class="row">
					<div class="col-lg-4">
					@auth
					<form action="https://tormented.rf.gd/Tormented/public/logout" method="POST">
                    <a href="https://tormented.rf.gd/Tormented/public/logout"><i  class="fa-solid fa-door-open" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;float:right;"></i></a>
                  </form>
                  <a href="https://tormented.rf.gd/Tormented/public/Addon/manage"><i class="fa-solid fa-gear" role="button" aria-hidden="true" style="font-size:25px;margin-right:30px;float:right;"></i></a>
                  @else
                  <a href="https://tormented.rf.gd/Tormented/public/login"><i class="fa-solid fa-arrow-right-from-bracket" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;margin-left:35px;float:right;"></i></a>
                    <a href="https://tormented.rf.gd/Tormented/public/register"><i class="fa-solid fa-user-plus" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;float:right;"></i></a>
                 @endauth

					</div>
					<div class="col-lg-4">
				<form action="" method="GET" name="">
				@auth
              <span class="font-bold uppercase" style="font-size:25px;color:white;">Hey: <b>{{Auth::user()->name}}</b></span>
              @endauth
					<div class="search-box">
						<button class="btn-search"><i class="fas fa-search"></i></button>
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
							<img src="img/review/4.jpg" alt="">
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
	<section class="newsletter-section">
		<div class="container">
			<h2>Subscribe to our newsletter</h2>
			<form class="newsletter-form">
				<input type="text" placeholder="ENTER YOUR E-MAIL">
				<button class="site-btn">subscribe  <img src="img/icons/double-arrow.png" alt="#"/></button>
			</form>
		</div>
	</section>
	<!-- Newsletter section end -->


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="footer-left-pic">
				<img src="img/footer-left-pic.png" alt="">
			</div>
			<div class="footer-right-pic">
				<img src="img/footer-right-pic.png" alt="">
			</div>
			<a href="#" class="footer-logo">
				<img src="./img/logo.png" alt="">
			</a>
			<ul class="main-menu footer-menu">
				<li><a href="">Home</a></li>
				<li><a href="">Games</a></li>
				<li><a href="">Reviews</a></li>
				<li><a href="">News</a></li>
				<li><a href="">Contact</a></li>
			</ul>
			<div class="footer-social d-flex justify-content-center">
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
			<div class="copyright"><a href="">Colorlib</a> 2018 @ All rights reserved</div>
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
