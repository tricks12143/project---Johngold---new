@include('inc.userheader')



		<section class="login">
			<div class="container">
				<div class="jg-login-container">
					<div class="jg-login-container-body">
							<div id="error_alert">
							
							</div>
						<center><h3>Enter Code</h3><p>Please enter the code that was sent to your email below.</p></center>
						
							<div class="form-group">
								<label for="usr">New Password:</label>
									<input type="password" class="form-control" id="cpass" name="cpassword" value="">
							</div>
							<div class="form-group">
								<label for="usr">Confirm Password:</label>
									<input type="password" class="form-control" id="pass" name="password" value="">
							</div>	
							
							<button type="button" id="passsubmit" class="btn btn-primary">Submit</button>
							<a href="{{ url('/login') }}" class="btn btn-default">Cancel</a>
						
					</div>
				</div>
			</div>
		</section>

@include('inc.userfooter')