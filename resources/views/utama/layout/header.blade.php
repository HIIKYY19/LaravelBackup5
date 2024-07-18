<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('utama/img/logo1.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>TIKET KERETA</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{asset('utama/css/linearicons.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/ion.rangeSlider.css')}}" />
	<link rel="stylesheet" href="{{asset('utama/css/ion.rangeSlider.skinFlat.css')}}" />
	<link rel="stylesheet" href="{{asset('utama/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('utama/css/main.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

	<link href="{{asset('utama/css/login-register.css')}}" rel="stylesheet" />

	<script src="{{asset('utama//js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{asset('utama/js/bootstrap.js')}}" type="text/javascript"></script>
	<script src="{{asset('utama/js/login-register.js')}}" type="text/javascript"></script>
</head>

<body>
@include('sweetalert::alert')
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{url('/dashboard')}}"><img src="{{asset('utama/img/logo1.png')}}" width="100px" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="{{ url('/tiket') }}">Tiket</a></li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Profile</a>
							<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="{{ url('/profile') }}">Profile</a></li>
								@auth
									<li class="nav-item"><a class="nav-link" href="{{ url('/riwayat/' . Auth::user()->id) }}">Riwayat Pesanan</a></li>
								@endauth
								
							</ul>
						</li>
						@if (Route::has('login'))
							@auth
								<li class="nav-item">
									<a class="nav-link" href="{{ route('logout') }}"
										onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
							@else
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">Login</a>
								</li>
							@endauth
						@endif
					</ul>
				</div>

							

						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
