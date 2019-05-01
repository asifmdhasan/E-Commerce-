@extends('home.index')
@section('content')
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Search Items By Category</h2>
		<?php 
    		foreach ($brand_by_products as $categorysearch) {?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset($categorysearch->myfile)}}"style="height: 150px;" alt="" />
											<h2>{{$categorysearch->price}} Tk</h2>
											<p>{{$categorysearch->productname}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>{{$categorysearch->manufacture_name}}</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>	
					</div><!--features_items-->
					@endsection