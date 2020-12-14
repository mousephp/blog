<!DOCTYPE html>
<html lang="en">

<head>
	<base href="{{asset('layouts/client')}}/">

	<title>News Time &mdash; Website Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>@yield('title')</title>

	<link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="fonts/icomoon/style.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/jquery.fancybox.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">

	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="css/aos.css">
	<link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<div class="site-wrap">

		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>



		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 col-lg-6 d-flex">
						<a href="{{asset('')}}" class="site-logo">
							NewsTime
						</a>

						<a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
							class="icon-menu h3"></span></a>

						</div>
						<div class="col-12 col-lg-6 ml-auto d-flex">
							<div class="ml-md-auto top-social d-none d-lg-inline-block">
								<a class="d-inline-block p-3"><span class="icon-facebook"></span></a>
								<a class="d-inline-block p-3"><span class="icon-twitter"></span></a>
								<a class="d-inline-block p-3"><span class="icon-instagram"></span></a>
							</div>
							<form action="{{asset('search')}}"  method="GET" class="search-form d-inline-block">
								@csrf
								@method('GET')
								<div class="d-flex">																		
									<input type="text" name="search" class="form-control" placeholder="Search...">
									<button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>							
								</div>
							</form>


						</div>
						<div class="col-6 d-block d-lg-none text-right">

						</div>
					</div>
				</div>




				<div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

					<div class="container">
						<div class="d-flex align-items-center">

							<div class="mr-auto">
								<nav class="site-navigation position-relative text-right" role="navigation">
									<ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
										<li class="active">
											<a href="{{asset('')}}" class="nav-link text-left">Home</a>
										</li>
										@foreach ($categories as $value)
										<li>
											<a href="{{asset('category/'.$value->id.'/'.$value->cate_slug.'.html')}}" class="nav-link text-left">{{$value->cate_name}}</a>
										</li>
										@endforeach 
										<li class="active">
											<a href="{{asset('about.html')}}" class="nav-link text-left">Tác giả</a>
										</li>
										
									</ul>                                                                                                                                                                  
								</nav>

							</div>

						</div>
					</div>

				</div>

			</div>


			





			<!-- content -->
			@section('content') 

			@show
			<!-- content -->









			<div class="site-section subscribe bg-light">
				<div class="container">
					<form action="#" class="row align-items-center">
						<div class="col-md-5 mr-auto">
							<h2>Bản tin</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
						</div>
						<div class="col-md-6 ml-auto">
							<div class="d-flex">
								<input type="email" class="form-control" placeholder="Enter your email">
								<button type="button" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
							</div>
						</div>
					</form>
				</div>
			</div>



			<div class="footer">
				<div class="container">


					<div class="row">
						<div class="col-12">
							<div class="copyright">
								<p>
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a target="_blank" >Colorlib</a>
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		<!-- .site-wrap -->


	<!-- loader -->
	<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.fancybox.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.mb.YTPlayer.min.js"></script>

	<script src="js/main.js"></script>

</body>

</html>