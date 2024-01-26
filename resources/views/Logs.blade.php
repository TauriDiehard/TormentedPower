<!DOCTYPE html>
<html lang="HU">
	<head>
		<title>Vengeance | Logs</title>
		@include('Parts/_head')
	</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

		@include('Parts/_header')


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/logok.png">
		<div class="page-info">
			<h2>Logs</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Logs</span>

			</div>
            <div class="site-breadcrumb">

            </div>

            <div class="site-breadcrumb">
            <div class="row">
                <span>
                </span>
                </div>
            </div>

		</div>
	</section>
	<!-- Page top end-->


	<!-- Review section -->
	<section class="review-section">
		<div class="container">
			@foreach ($logocskak as $log)
                <div class="review-item">
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-6">
                            <div  class="review-content text-box text-white">
                                <div class="rating">
                                <small>{{$log->created_at}}</small>
                                </div>
                                <h3>{{$log->title}}</h3>
                                <a href="Logs/{{$log['id']}}" class="read-more">Tovább  <img src="img/icons/double-arrow.png" alt="#"/></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </div>
                </div>
			@endforeach
			<div class="pages">
                      {{$logocskak->links('pagination::bootstrap-5')}}
            </div>

		</div>
	</section>
	<!-- Review section end-->


	<!-- Newsletter section -->
	<!-- Newsletter section end -->


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
