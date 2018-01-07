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
						<center><h3>Forgot Password Form</h3></center>
						<form class="form-horizontal" method="POST" action="{{ url('/handleforgot') }}">
							{{ csrf_field() }}
							@if(count($users) > 0)
								@foreach($users as $user)
								<?php session()->put('hiduserid', $user->id); ?>
									<div class="form-group">
									  <label for="usr">Email:</label>
									  <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
									</div>		
								@endforeach
							@endif
							
							<button type="submit" class="btn btn-primary">Request Code</button>
							<a href="{{ url('/login') }}" class="btn btn-default">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</section>
@include('inc.userfooter')