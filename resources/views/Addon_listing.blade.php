<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Vengeance | Listing</title>
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
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"/>
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}"/>
		<link rel="stylesheet" href="{{ asset('css/slicknav.min.css')}}"/>
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}"/>
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}"/>
		<link rel="stylesheet" href="{{ asset('css/animate.css')}}"/>
	
		<!-- Main Stylesheets -->
		<link rel="stylesheet" href="{{ asset('css/style.css')}}"/>
		<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
	</head>

  <body>
  <style>

.modal {
z-index:1;
display:none;
padding-top:10px;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
overflow:auto;
background-color:rgb(0,0,0);
background-color:rgba(0,0,0,0.8)
}

.modal-content{
  display: block;
align-content: center;
background-color: white !important;
width: auto;
    position:absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


.modal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden
}

.modal-hover-opacity:hover {
opacity:0.60;
filter:alpha(opacity=60);
-webkit-backface-visibility:hidden
}


.close {
text-decoration:none;float:right;font-size:24px;font-weight:bold;color:white
}
.container1 {
width:200px;
display:inline-block;
}
.modal-content, #caption {   
  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}


@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

</style>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="home.html" class="site-logo">
        <img style="height: 45px;border-radius: 40%; margin-top:-10px;" src="img/logo.webp" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href=""><i class="fa-brands fa-discord" aria-hidden="true" style="margin-right: 15px;"></i></a>
						<a href=""><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="/">Home</a></li>
						<li><a href="Logs">Logs</a>
						</li>
						<li><a href="{{asset('Addon')}}">Addons</a></li>
						<li><a href="blog.html">Join Us</a></li>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{asset('img/listing.webp')}}">
		<div class="page-info">
			<h2>Listing</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Listing</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Games section -->
	<section class="games-single-page">
		<div class="container">


			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
        <div class="gs-meta">
        @if($listing->tags == "Elvui")
                  <p id="warning" style="background-color:yellow;" align="center" class="card-text"><b><img   src="{{asset('Index_kepek\warning.png')}}">Attention, download the importable multifunctional Elvui: </b><a href="https://github.com/ElvUI-MoP/ElvUI-5.4.8"><b>Elvui</b></a><img  src="{{asset('Index_kepek\warning.png')}}"></p>
                  @else
                  <p id="warning" style="background-color:yellow;" align="center" class="card-text"><b><img  src="{{asset('Index_kepek\warning.png')}}">Attention, download the importable multifunctional Weakaura: </b><a href="https://github.com/Maczuga/WeakAuras2-MoP/releases/tag/1.2.14"><b>Weakaura</b></a><img  src="{{asset('Index_kepek\warning.png')}}"></p>
        @endif
        </div>
					<div class="gs-meta"><a href="">{{$listing->updated_at}}</a></div>
					<h2 class="gs-title">{{$listing->title}}</h2>
					<p>Description: <br>{{$listing->description}}</p>

            @if (!empty($listing->imgaddons))
              @foreach (json_decode($listing->imgaddons) as $imgaddon)
                <img class="img-fluid" onclick="onClick(this)" style="width:40% !important; border: solid 1px white;" src="{{ asset('storage/'.$imgaddon) }}">
                @endforeach
              @endif
              <div id="modal01" class="modal" onclick="this.style.display='none'">
                <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <div class="modal-content">
                    <img id="img01" style="height: 400px !important;">
                </div>
                </div>
           </div>
           
				<div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="rating-widget">
								<h4 class="widget-title">Info</h4>
								<ul>
									<li>Made by:<span>{{$listing->user->name}}</span></li>
									<li>Type:<span>{{$listing->tags}}</span></li>
                  <li>Rate:<span>N/A</span></li>
									<li>Updated:<span>{{$listing->updated_at}}</span></li>

									
								</ul>
								<div class="rating">
                  <br>
  <div class="toast">
  
  <div class="toast-content">
    <i class="fas fa-solid fa-check check"></i>

    <div class="message">
      <span class="text text-1">Success</span>
      <span class="text text-2">Your changes has been saved</span>
    </div>
  </div>
  <i class="fa-solid fa-xmark close"></i>

  <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
  <div class="progress"></div>
</div>

									<h5 class="blog-filter" onclick="myFunction()"><li value="{{$listing->import}}"><a href="#"> Copy Import</a></li></h5>
<input type="text" value="{{$listing->import}}" id="myInput" style="position: absolute; left: -9999px;">
<button  id="success-btn" style="display: none;">Success Button</button>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Games end-->

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
      
			
			<div class="copyright"><a href="">Vengeance</a> 2023 @ All rights reserved</div>
		</div>
	</footer>
	<!-- Footer section end -->

 <script>

function myFunction() {
              var copyText = document.getElementById("myInput");
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand("copy");
              alert("Successful Copy");
   
}
</script>
 <script>

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>


	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/jquery.slicknav.min.js')}}"></script>
	<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('js/jquery.sticky-sidebar.min.js')}}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ asset('js/main.js')}}"></script>

	</body>
</html>