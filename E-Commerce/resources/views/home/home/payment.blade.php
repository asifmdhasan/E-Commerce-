@extends('home.index')
@section('content')
	<section id="cart_items">
		<div class="container col-sm-12" >
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
							<td class="total">Product Total</td>
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
							<td class="cart_description">
								<h4><a href="">{{($con->qty)}}</a></h4>
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{($con->total)}}Tk</p>
							</td>
						</tr>
							@endforeach
					</tbody>
				</table>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>
								<h3>
									Total Amount = <span>{{Cart::total()}} Tk</span>
								</h3>
							</li>
						</ul>
					</div>
				</div>

		</div>
	</div>
				<div class="paymentCont col-sm-8" align="center">
					<div class="headingWrap">
						<h3 class="headingTop text-center">Select your payment method</h3>

					</div>
				
			<form action="{{url('order_place')}}" method="post">
				{{csrf_field()}}
				<input type="radio"name="payment_method"value="handcash"><font size="5"> Hand Cash<br>
				<input type="radio" name="payment_method" value="debit"> Debit Card<br>
				<input type="radio" name="payment_method" value="bKash"> bKash<br>
				<input type="submit" name="submit" value="Done">
				</form>

				</div>
			</div>
@endsection