				<input type="hidden" id="pageurlfortexteditor" value="{{ url('js/plugins/') }}">
			</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
		
		<script type="text/javascript" src="{{ url('js/pagination.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/editpage-johngold.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/plugins/nicEdit.js') }}"></script>
		
		<script type="text/javascript">
		var area1;
		function toggleArea1() {
			for(var i = 0; i < $('#tacount').val(); i++){

					area1 = new nicEditor({fullPanel : true}).panelInstance('area3'+i,{hasPanel : true});

			}
		}


		bkLib.onDomLoaded(function() { toggleArea1(); });

		//bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });

		function clksource(){
			var nicE = new nicEditors.findEditor('area30');
			$('#txtsource').val(nicE.getContent());
		}

		$(document).ready(function () {
		  var trigger = $('.hamburger'),
		      overlay = $('.overlay'),
		     isClosed = false;

		    trigger.click(function () {
		      hamburger_cross();      
		    });

		    function hamburger_cross() {

		      if (isClosed == true) {          
		        overlay.hide();
		        trigger.removeClass('is-open');
		        trigger.addClass('is-closed');
		        isClosed = false;
		      } else {   
		        overlay.show();
		        trigger.removeClass('is-closed');
		        trigger.addClass('is-open');
		        isClosed = true;
		      }
		  	}
		  $('#btnsubmit').on('click', function(){
		    	$('#btnsubmit').prop('disabled', false);
		    });
		  
		  $('[data-toggle="offcanvas"]').click(function () {
		        $('#wrapper').toggleClass('toggled');
		  });

		  $('#chpagetypeall').click(function () {
				$('.jg-checkbox').not(this).prop('checked', this.checked);
			});
		});

		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewpic')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

		
		</script>
	</body>

</html>