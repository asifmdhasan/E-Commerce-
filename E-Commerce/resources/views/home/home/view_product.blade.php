@extends('home.index')
@section('content')
	<?php 
		foreach ($view_product as $product_view) {?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset($product_view->myfile)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{asset('userdes/images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$product_view->productname}}</h2>
								<p>Web ID: {{$product_view->id}}</p>
								<img src="{{asset('userdes/images/product-details/rating.png')}}" alt="" />
								<span>
									<span>{{$product_view->price}}Tk</span>
									<form action="{{url('add-to-cart')}}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<label>Quantity:</label>
										<input type="text" name="quantity"value="1" />
										<input type="hidden" name="id"value="{{$product_view->id}}" />
										<button name="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
										</button>
									</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$product_view->manufacture_name}}</p>
								<a href=""><img src="{{asset('userdes/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
				</div>
			<?php } ?>
				@endsection