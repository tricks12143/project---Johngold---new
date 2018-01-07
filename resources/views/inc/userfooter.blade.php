<input type="hidden" id="hostme" value="{{ url('/') }}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/admin-johngold.js') }}"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			    $('#codesubmit').on('click', function (e) {
			    	e.preventDefault();
			        $.ajax({
			            type: 'GET',
			            url: $('#hostme').val() + '/handleforgotsubmit',
			            data: { code : $('#code').val() },
			            success: function( data ) {
			            	if(data == "success"){
			            		window.location.replace($('#hostme').val()+"/changepassword");
			            	}
			            	else{
			            		$('#error_alert').html(data);	
			            	}
			            }
			        });
			    });

			    $('#name').on('change', function(){
			    	$('#hidname').val($(this).val());
			    });

			    $('#passsubmit').on('click', function (e){
			    	e.preventDefault();
			        $.ajax({
			            type: 'GET',
			            url: $('#hostme').val() + '/handlepasschange',
			            data: { pass : $('#pass').val(), cpass : $('#cpass').val() },
			            success: function( data ) {
			            	if(data == "success"){
			            		alert("Password successfully change.");
			            		window.location.replace($('#hostme').val()+"/login");
			            	}
			            	else{
			            		$('#error_alert').html(data);	
			            	}
			            }
			        });
			    });
			});
		</script>
	</body>
</html>