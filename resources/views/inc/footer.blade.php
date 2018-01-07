
		
		<script type="text/javascript" src="{{ url('js/contact_me.js') }}"></script>
		
		<script type="text/javascript" src="{{ url('js/johngold.js') }}"></script>
		
		<script type="text/javascript" src="{{ url('js/chat.js') }}"></script>
		<script>
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
			$(document).ready(function() {
			    $('#testchat').on('submit', function (e) {
			        e.preventDefault();
			        $.ajax({
			            type: 'GET',
			            url: $('#hostme').val() + '/resources/views/inc/chat_send_ajax.php',
			            data: $("#testchat").serialize(),
			            success: function( msg ) {
			            	alert(msg);
			            }
			        });
			    });
			});
		</script>

		
	</body>

</html>