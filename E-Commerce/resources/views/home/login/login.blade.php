@extends('home.index')
@section('content')

		<div class="container col-sm-12">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/login_check')}}" method="post">
						    {{csrf_field()}}
							<input type="text" required="" placeholder="Name" name="name" />
							<input type="password" placeholder="Passwords" name="password" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/reg')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="Full Name" name="name" required="" />
							<input type="password" placeholder="Password" name="password" required=""/>
							<input type="email" placeholder="example@somthing.com" name="email" required=""/>
							<select name="type" required="">
								<option>Select Type</option>
								<option value="1">Admin</option>
								<option value="0">User</option>
							</select>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	


@endsection