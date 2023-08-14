@props(['tagsCsv'])
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
		<link rel="stylesheet" href="/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="/css/slicknav.min.css"/>
		<link rel="stylesheet" href="/css/owl.carousel.min.css"/>
		<link rel="stylesheet" href="/css/magnific-popup.css"/>
		<link rel="stylesheet" href="/css/animate.css"/>
	
		<!-- Main Stylesheets -->
		<link rel="stylesheet" href="/css/style.css"/>

		<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
	</head>
@php
    $tags=explode(',', $tagsCsv);
@endphp
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
@foreach($tags as $tag)
<h5 class="card-tags">
<div class="top-meta"><a href="Addon/?tag={{$tag}}"><div class="top-meta">'{{$tag}}'</div></a></div>
</h5>
@endforeach
</html>