	<div class="jg-chat-box fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="chat-content">
						<div class="chat-header">
							<p>Chat</p>
							<div class="dropdown">
							  <span class="fa fa-cog dropdown-toggle"  data-toggle="dropdown"></span>
							  <ul class="dropdown-menu">
							  	<a href=""><li>Minimize</li></a>
							  	@if(!empty(session()->get('chat_id')))
							  		<a href="#" onclick="myconfirm()"><li>Leave Conversation</li></a>
							  	@endif
							  	<div id="leaveme"></div>
							  </ul>
							</div>
						</div>
						<div class="chat-body">
							<div class="chat-container" id="DIV_CHAT">
                    		
                    		</div>
						</div>
						<div class="chat-footer">
							<div class="row">
								<div class="col-sm-10 unpadd-right">
									<input id="txtmsg" class="form-control chat-input" type="text" name="msg" />
								</div>
								<div class="col-sm-2 unpadd-left">
									<button id="jg-chat-submit" class="btn btn-primary chat-btn" type="button" value="Send">
										<i class="fa fa-arrow-right" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="chat_uri" value="{{ url('inc/') }}">
	<input type="hidden" id="hostme" value="{{ url('/') }}">
	<input type="hidden" id="chat_user" value="user">

