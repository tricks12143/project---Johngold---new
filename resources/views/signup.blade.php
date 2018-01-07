@include('inc.userheader')
		<section class="login">
			<div class="container">
				<div class="jg-login-container">
					<div class="jg-signup-container-body">
						@if(session('info'))
								<div class="alert alert-danger">
									  {{session('info')}}
								</div>
						@endif
						<h3>Sign up form</h3>
						{!! Form::open(array('route' => 'users.store')) !!}
						<!--<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/users/store') }}">-->
							{{csrf_field()}}
							<div class="form-group">
							  <label for="">Lastname:</label>
							  <input type="text" class="form-control" name="lname" value="{{ session()->get('reg_lname') }}">
							</div>
							<div class="form-group">
							  <label for="">Firstname:</label>
							  <input type="text" class="form-control" name="fname" value="{{ session()->get('reg_fname') }}">
							</div>
							<div class="form-group">
							  <label for="">Middlename:</label>
							  <input type="text" class="form-control" name="mname" value="{{ session()->get('reg_mname') }}">
							</div>
							<div class="form-group">
							  <label for="">Email address:</label>
							  <input type="text" class="form-control" name="email" value="{{ session()->get('reg_email') }}">
							</div>
							<div class="form-group">
							  <label for="">Username:</label>
							  <input type="text" class="form-control" name="name" value="{{ session()->get('reg_username') }}">
							</div>
							<div class="form-group">
							  <label for="">Password:</label>
							  <input type="password" class="form-control" name="password">
							</div>
							<div class="form-group">
							  <label for="">Confirm Password:</label>
							  <input type="password" class="form-control" name="cpassword">
							</div>
							<button type="submit" class="btn btn-primary">Sign up</button>
							<a href="{{ url('/login') }}" class="btn btn-default">Cancel</a>
						<!--</form>-->
						{!! Form::close() !!}

					</div>
				</div>
			</div>
		</section>



@include('inc.userfooter')