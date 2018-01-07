/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("johngold-mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("johngold-mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

			$(document).ready(function(){


				$('#insertpagetype').submit(function(){
					$.ajax({
                            type:"post",
                            url:"insertpagetype",
                            data:$("#insertpagetype").serialize(), // it will serialize the form data
                            dataType: 'json',
                              success: function(data){
						        alert(data.stat);
						        window.location.replace('admin/categories');  
						      },
						      error: function(data){
						       	var errors = data.responseJSON;
						        console.log(data);
						        alert(JSON.stringify(data));
						        window.location.replace('admin/categories');  
						      }
                    });
				});

				if($('#type').val() == 'block') {
					$('#blocks-type').css('display', 'block');
				}

				$('#stat_change_offline').on('click', function (e){
					e.preventDefault();
			        $.ajax({
			            type: 'GET',
			            url: $('#hostme').val() + '/changestat',
			            data: { 'stat' : 'Offline' },
			            success: function( msg ) {
			            	if(msg == "success"){
			            		location.reload();
			            	}
			            },error:function(){ 
				            alert("An error occured, Make sure your connection is stable.");
				        }
			        });
				});

				$('#stat_change_online').on('click', function (e){
					e.preventDefault();
			        $.ajax({
			            type: 'GET',
			            url: $('#hostme').val() + '/changestat',
			            data: { 'stat' : 'Online' },
			            success: function( msg ) {
			            	if(msg == "success"){
			            		location.reload();
			            	}
			            },error:function(){ 
				            alert("An error occured, Make sure your connection is stable.");
				        }
			        });
				});

			});

			function getComboA(selectObject) {
			    var value = selectObject.value;
			    if(value == 'block') {
			    	$('#blocks-type').css('display', 'block');
			    }
			    else{
			    	$('#blocks-type').css('display', 'none');
			    }
			}

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#prof_img_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#prof_img").change(function() {
  readURL(this);
});