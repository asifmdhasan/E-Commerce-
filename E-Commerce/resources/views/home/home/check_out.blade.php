@extends('home.index')
@section('content')


			<div class="register-req ">
				<p>Please Fill Up This Form Carefully</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-20">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="{{url('save_shipping')}}" method="post">
									{{csrf_field()}}
									<input type="text" name="email" placeholder="Email*">
									<input type="text" name="first_name" placeholder="First Name *">
									<input type="text" name="last_name" placeholder="Last Name *">
									<input type="text" name="address" placeholder="Address *">
									<input type="text" name="phone" placeholder="Mobile N0">
									<input type="text" name="city" placeholder="City *">
									<input type="submit" class="btn btn-success" value="Submit">
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
		@endsection


