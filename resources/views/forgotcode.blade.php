@include('inc.userheader')



		<section class="login">
			<div class="container">
				<div class="jg-login-container">
					<div class="jg-login-container-body">
							<div id="error_alert">
							
							</div>
						<center><h3>Enter Code</h3><p>Please enter the code that was sent to your email below.</p></center>
						<!--<form class="form-horizontal" method="POST" action="{{ url('/handleforgotsubmit') }}">-->
							<div class="form-group">
								<label for="usr">Code:</label>
									<input type="text" class="form-control" id="code" name="code" value="">
							</div>		
							
							<button type="button" id="codesubmit" class="btn btn-primary">Submit</button>
							<a href="{{ url('/login') }}" class="btn btn-default">Cancel</a>
						<!--</form>-->
					</div>
				</div>
			</div>
		</section>
@include('inc.userfooter')
