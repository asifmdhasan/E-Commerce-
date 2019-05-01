@extends('home.index')

@section('content')
@include('home.slider')
						<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
		<?php
		$data=DB::table('products')
    	->join('categories','categories.catid','=','products.catid')
    	->leftjoin('manufactures','manufactures.manufacture_id', '=','products.manufacture_id')
    	->where('publicationstatus',1)
    	->get();
    	foreach ($data as $product) {?>

    	
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset($product->myfile)}}"style="height: 150px;" alt="" />
											<h2>{{$product->price}} Tk</h2>
											<p>{{$product->productname}}</p>
											<a href="{{asset('view_product.'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>{{$product->manufacture_name}}</a></li>
										<li><a href="{{asset('view_product.'.$product->id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>	
					</div><!--features_items-->
					
					
					
					
					
					
					
					
				












@endsection