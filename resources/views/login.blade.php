{{session()->forget('staffuser')}}
{{session()->forget('tempuser')}}
<?php
	session()->forget('reg_lname');
    session()->forget('reg_fname');
    session()->forget('reg_mname');
    session()->forget('reg_email');
    session()->forget('reg_username');
    session()->forget('hiduserid');
?>
@include('inc.userheader')



		<section class="login">
			<div class="container">
				<div class="jg-login-container">
					<div class="jg-login-container-body">
						@if(session('info'))
								<div class="alert alert-danger">
									  {{session('info')}}
								</div>
						@endif
						<form class="form-horizontal" method="POST" action="{{ url('/handleLogin') }}">
							{{ csrf_field() }}
							
							<div class="form-group">
							  <label for="usr">Username:</label>
							  <input type="text" class="form-control" id="name" name="name" value="{{ session()->get('tempuser') }}" autocomplete="off">
							</div>
							<div class="form-group">
							  <label for="pwd">Password:</label>
							  <input type="password" class="form-control" name="password">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
							<a href="{{ url('/users/create') }}" class="btn btn-default">Signup</a>
						</form>
						<form method="POST" action="{{ url('/forgotpassword') }}">
							{{ csrf_field() }}
							<input type="hidden" id="hidname" name="hidname"/>
							<button type="submit" class="btn btn-default" style="float:right">Forgot Password</button>
						</form>
					</div>
				</div>
			</div>
		</section>

@include('inc.userfooter')