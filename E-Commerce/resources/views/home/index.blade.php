<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | A@S-Shopper</title>
    <link href="{{asset('userdes/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('userdes/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('userdes/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('userdes/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('userdes/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('userdes/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('userdes/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('userdes/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('userdes/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('userdes/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('userdes/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('userdes/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +880 1925272409</a></li>
								<li><a href="https://mail.google.com"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/login"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://bd.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
								
								<li><a href="https://aboutme.google.com/u/0/?referer=gplus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{route('home')}}"><img src="{{asset('userdes/images/home/logo.png')}}" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							
								<li><a href="{{route('show_cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

							<?php

								$customer_id= Session::get('customer_id'); 
								$shipping_id=Session::get('ship_id'); 
								//print_r($customer_id);
								//print_r($shipping_id);
								if($customer_id != NULL && $shipping_id==NULL){
							?>
								<li>
									<a href="{{route('check_out')}}"><i class="fa fa-crosshairs"></i> Checkout
									</a>

								</li>
							<?php }elseif($customer_id != NULL && $shipping_id!=NULL){ ?>
								<li>
									<a href="{{route('payment')}}"><i class="fa fa-crosshairs"></i> Checkout
									</a>
								</li>
							<?php } else{ ?>

								<li>
									<a href="{{route('login')}}"><i class="fa fa-lock"></i> Checkout
									</a>
								</li>
							<?php } ?>
								<?php if($customer_id != NULL){?>
								<li><a href="{{route('logout')}}"><i class="fa fa-lock"></i> Logout</a></li><?php }else{ ?>
									<li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li><?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
@yield('slider');
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
								$publishcategory=DB::table('categories')
								->where('catpublicationstatus',1)
								->get();
								foreach ($publishcategory as $cat) {?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{asset('/category_by_products.'.$cat->catid)}}">{{ $cat->catname}}</a></h4>
								</div>
							</div>

						<?php } ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<?php
								$brand=DB::table('manufactures')
								->where('manu_publicationstatus',1)
								->get();
								foreach ($brand as $ban) {?>
								<li><a href="{{asset('/brand_by_products.'.$ban->manufacture_id)}}"> <span class="pull-right">(50)</span>
									{{ $ban->manufacture_name}}</a></li>
									<?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
					
					</div>
				</div>
				<div class="col-sm-9 padding-right">

				@yield('content')			
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('userdes/images/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('userdes/images/home/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('userdes/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('userdes/images/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('userdes/images/home/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
    <script src="{{asset('userdes/js/jquery.js')}}"></script>
	<script src="{{asset('userdes/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('userdes/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('userdes/js/price-range.js')}}"></script>
    <script src="{{asset('userdes/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('userdes/js/main.js')}}"></script>
</body>
</html>