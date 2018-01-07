			<input type="hidden" id="pageurlfortexteditor" value="{{ url('js/plugins/') }}">
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/admin-johngold.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/plugins/nicEdit.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/chat-admin.js') }}"></script>
		<script type="text/javascript">
		var area1;
		


		function toggleArea1() {
			for(var i = 0; i < Number($('#textcount').val()); i++){

				
					area1 = new nicEditor({fullPanel : true}).panelInstance('area3'+i,{hasPanel : true});

			}
		}

		

		$(document).ready(function () {
		  $('#btnsubmit').on('click', function(){
		    	$('#btnsubmit').prop('disabled', false);
		    });
			var $input = $('#refresh');

		    $input.val() == 'yes' ? location.reload(true) : $input.val('yes');
		});


		bkLib.onDomLoaded(function() { toggleArea1(); });
		</script>
	</body>
</html>