@extends('home.index')
@section('content')
	<section id="cart_items">
		<div class="container col-sm-12" >
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php 
				$contents =Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="name">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $con)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{($con->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{($con->name)}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{($con->price)}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update-cart')}}" method="post">
										{{csrf_field()}}
									<input class="cart_quantity_input" type="number" name="qty" value="{{($con->qty)}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$con->rowId}}" >
									<input type="submit" name="submit" value="Update" >
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{($con->total)}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{asset('cart_delete.'.$con->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
							@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container col-sm-12">
			<div class="row">
				
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Total <span>{{Cart::subtotal()}}</span></li>
							<li>Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>


							<?php $customer_id= Session::get('customer_id'); 
								$shipping_id=Session::get('ship_id'); 
								 if($customer_id != NULL && $shipping_id==NULL){
							?>

									<a class="btn btn-default check_out" href="{{route('check_out')}}"> Check Out
									</a>

								<?php }if($customer_id != NULL && $shipping_id!=NULL){ ?>
									<a class="btn btn-default check_out" href="{{route('payment')}}"> Check Out
									</a>

								<?php }if($customer_id == NULL && $shipping_id==NULL){?>

									<a class="btn btn-default check_out" href="{{route('login')}}">Check Out
									</a>
									<?php } ?>


					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection