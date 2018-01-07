var t = setInterval(function(){get_chat_msg()},1000);
//var t2 = setInterval(function(){get_staff_chat_msg()},1000);


		//
		// General Ajax Call
		//
		      
		var oxmlHttp;
		var oxmlHttpSend;
		var chaturi = $('#chat-uri').val() + "/";
		//sending message
		$('#jg-chat-submit').on("click", function(){
			var leavebtn = '<a href="#" onclick="myconfirm()"><li>Leave Conversation</li></a>';
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/send_msg',
		            data: {'user' : 'user', 'msg' : $('#txtmsg').val()},
		            success: function (data) {
		                $('#DIV_CHAT').append(data);
		                $('#leaveme').html(leavebtn);
		                $('#txtmsg').val('');
		            }
		        }
		    );
		});
		
		function get_staff_chat_msg(){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_staff',
		            data: '',
		            success: function (data) {
		                $('#DIV_CHAT').html(data);
		            }
		        }
		    );
		}

		function get_chat_msg(){
			$.ajax(
		        {
		            type: 'GET',
		            url: $('#hostme').val()+'/get_msg',
		            data: {'user' : 'user'},
		            success: function (data) {
		                $('#DIV_CHAT').html(data);
		                updateScroll();
		            }
		        }
		    );
		}
		var scrolled = false;
		function updateScroll(){
		    if(!scrolled){
		        var element = document.getElementById("DIV_CHAT");
		        element.scrollTop = element.scrollHeight;
		    }
		}

		$("#DIV_CHAT").on('scroll', function(){
		    scrolled=true;
		});

		function myconfirm(){
			var ref = confirm("Are you sure you want to leave the conversation?");
			if(ref == true){
				window.location = $('#hostme').val()+"/leaveconversation";
			}
		}