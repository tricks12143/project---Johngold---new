var t = setInterval(function(){get_available_chat()},1000);
var t2 = setInterval(function(){get_chat_msg()},1000);

//var t2 = setInterval(function(){get_staff_chat_msg()},1000);

		//
		// General Ajax Call
		//
		      
		var oxmlHttp;
		var oxmlHttpSend;
		var chaturi = $('#chat-uri').val() + "/";
		//sending message
		$('#jg-chat-submit').on("click", function(){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/send_msg',
		            data: {'user' : 'staff','msg' : $('#msg').val()},
		            success: function (data) {
		                $('#jg-admin-msg').append(data);
		                $('#msg').val('');
		            }
		        }
		    );
		});

		function refresh(){
			location.reload();
		}
		
		function get_staff_chat_msg(){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_staff',
		            data: '',
		            success: function (data) {
		                $('#jg-admin-msg').html(data);
		            }
		        }
		    );
		}

		function get_chat_msg(){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_msg',
		            data: {'user' : 'staff'},
		            success: function (data) {
		                $('#jg-admin-msg').html(data);
		                updateScroll();
		            }
		        }
		    );
		}
		

		function get_available_chat(){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_user_msg',
		            success: function (data) {
		            	$('#get_available_chat').html(data);
		            }
		        }
		    );
		}

		function chatnoxcontent(id){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_chatbox',
		            data: { chat_id : id },
		            success: function (data) {

		            }
		        }
		    );
		}

		var scrolled = false;
		function updateScroll(){
		    if(!scrolled){
		        var element = document.getElementById("jg-admin-msg");
		        element.scrollTop = element.scrollHeight;
		    }
		}

		$("#jg-admin-msg").on('scroll', function(){
		    scrolled=true;
		});

		function myconfirm(){
			var ref = confirm("Are you sure you want to leave the conversation?");
			if(ref == true){
				window.location = $('#hostme').val()+"/adminleavecon";
			}
		}

		function user_chat_list(id){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_user_chat_list',
		            data: { user_id : id },
		            success: function (data) {
		                $('#list_of_chat').html(data);
		            }
		        }
		    );
		}

