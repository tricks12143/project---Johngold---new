/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

jQuery(document).ready(function(){
	var accordionsMenu = $('.cd-accordion-menu');

	if( accordionsMenu.length > 0 ) {
		
		accordionsMenu.each(function(){
			var accordion = $(this);
			//detect change in the input[type="checkbox"] value
			accordion.on('change', 'input[type="checkbox"]', function(){
				var checkbox = $(this);
				console.log(checkbox.prop('checked'));
				( checkbox.prop('checked') ) ? checkbox.siblings('ul').attr('style', 'display:none;').slideDown(300) : checkbox.siblings('ul').attr('style', 'display:block;').slideUp(300);
			});
		});
	}
});

			$(document).ready(function(){

				$('#edit-page-form').submit(function(){

					$.ajax({
                            type:"post",
                            url:"insertcontentsub",
                            data:$("#edit-page-form").serialize(), // it will serialize the form data
                            dataType: 'html',
                              success:function(data){
                                if(data.stat == 'fail') {
                                        alert("Transaction failed!");
                                    }
                                else {
                                	
                                    alert("Success!");
                            }
                        }
                    });
				});
			});