<!DOCTYPE html>
<html lang="HU">
<head>
	<title>TheSimps</title>
	@include('Parts/_head')
</head>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	@include('Parts/_header')


	<!-- Hero section -->
	<section class="hero-section overflow-hidden">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/top.jpg">
				<div class="container">
					<h2 style="text-shadow: 5px 0px 13px rgba(0, 0, 0, 1);">CUM!</h2>
					<p></p>
					<a href="Addon" class="site-btn">Addonok<img src="img/icons/double-arrow.png" alt=""/></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end-->


	<!-- Intro section -->
	<section class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="intro-text-box text-box text-white">
						<img style="border-radius: 16%;" src="img/discord-server.png" alt="#"/></i>
					</div>
				</div>
				<div class="col-md-5">
					<div class="intro-text-box text-box text-white">
						<h3>Discord</h3>
						<p>Csak ha szeretnél csatlakozni funny simp szerverre.</p>
						<ul class="blog-filter">
							<li><a href="https://discord.gg/872DwDdg"> Csatlakozok <img src="img/icons/double-arrow.png" alt="#"/> </a></li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	


	<!-- Featured section -->
		<!-- Intro section -->
		<section class="intro-section" style="background-image: url('img/twitch.jpg'); background-repeat: no-repeat; background-position:center;background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="intro-text-box text-box text-white">
							
							<div class="green-rectangle" style="  width: 100%;height: auto; background: rgb(100,100,190);
							background: linear-gradient(166deg, rgba(100,100,190,1) 0%, rgba(100,100,190,1) 46%, rgba(143,0,255,0.9710083862646621) 92%);border-radius: 10%;padding: 30px;">
								<h3 style="font-family: 'BastamanBold' !important;font-size:24px;">@php
									echo date("F, Y");
								@endphp  </h3>
								<p style="font-family: 'BastamanBold' !important;font-size:14px; color:white;">Streaming pvp,m+, and Guild Raids</p>
								<h4 style="font-family: 'BastamanBold' !important;font-size:12px;margin-top:-35px;"><i class="fa fa-clock-o" aria-hidden="true"></i> 18:00 - 22:00</h4>
							  </div>
	
						</div>
					</div>
					<div class="col-md-7">
						<div class="intro-text-box text-box text-white">
							  
						</div>
						<script src="https://player.twitch.tv/js/embed/v1.js"></script>
						<div id="test" class="embed-responsive embed-responsive-16by9"></div>
							
                            <script type="text/javascript">
                              var options = {
                                channel: "Tapy_tv",
                                width: "100%",
                                height: "100%",
                                parent: ["local"],
                              };
                              var player = new Twitch.Player("test", options);
                              
                            </script>         

					</div>
					
				</div>
			</div>
		</section>
	<!-- Featured section end-->
	@include('Parts/_footer')
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
