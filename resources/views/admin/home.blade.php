
@include('inc.adminheader')
<input type="hidden" id="refresh" value="no">
	<section class="johngold-dashboard">
		<div class="container">
			<div class="row">
				<div class="col col-md-12">

					<br>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
					            <div class="panel panel-default">
					                <div class="panel-heading">
					                    <h3 class="panel-title">Chat Panel</h3>
					                    <span class="pull-right">
					                        <!-- Tabs -->
					                        <ul class="nav panel-tabs">
					                            <li class="active"><a href="#tabs1" data-toggle="tab" onclick="refresh()">Chat tab</a></li>
					                            <li><a href="#tabs2" data-toggle="tab">History Chat</a></li>
					                        </ul>
					                    </span>
					                </div>
					                <div class="panel-body">
					                    <div class="tab-content">

					                        <div class="tab-pane active" id="tabs1">
					                        	<div id="col-md-12">
					                        		<div class="panel panel-default">
										                <div class="panel-heading">
										                    <h3 class="panel-title">Chat Message Board</h3>
											                    <span class="pull-right">
											                        <!-- Tabs -->
											                        <div id="get_available_chat">
												                        <!-- Here is the dynamic tab -->
												                    </div>
											                    </span>
											                </div>
										                <div class="panel-body">
										                    <div class="tab-content" id="tab_content">
										                    	<!-- Here is the dynamic chatbox -->
										                        <div class="tab-pane active" id="tabs1">
										                        	<div class="row">
										                        		<div class="col-md-12">
												                        	<div class="row">
												                        		<div class="col-md-6">
													                        		<div id="jg-admin-msg">
													                        		
													                        		</div>
													                        	</div>
													                        	<div class="col-md-6">
													                        		<div id="jg-admin-info">
													                        			<a href="#" onclick="myconfirm()">Leave Conversation</a>
													                        		</div>
													                        	</div>
												                        	</div>
												                        	<div class="row">
												                        		<div  class="col-md-5">
																					<div class="input-group">
																				      <input type="text" class="form-control" id="msg" placeholder="Message">
																				      <span class="input-group-btn">
																				        <button id="jg-chat-submit" class="btn btn-primary" type="button" style="padding:10px">SEND</button>
																				      </span>
																				    </div>
													                        	</div>
												                        	</div>
												                        </div>
												                    </div>
										                        </div>

										                    </div>
										                </div>
										            </div>
					                        	</div>
					                        </div>
					                        <div class="tab-pane" id="tabs2">
					                        	<div class="row">
					                        		<div class="col-md-4">
					                        			<h5>Staff List</h5>
					                        			@if(count($users) > 0)
					                        				@foreach($users as $user)
					                        					<a href="#" class="jg-user-list-a" onclick="user_chat_list({{ $user->id }})"><div class="jg-user-list"><img src="{{ url('img/gallery/',$user->img) }}" alt="Profile img"><b>{{ $user->fname . " " . $user->mname . " " .$user->lname }}</b></div></a>
					                        				@endforeach
					                        			@endif
					                        		</div>
					                        		<div class="col-md-8">
					                        			<h5>Chat List</h5>
					                        			<div id="list_of_chat">

					                        			</div>
					                        		</div>
					                        	</div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
		
		<input type="hidden" id="hostme" value="{{ url('/') }}">

  
          
        
		
@include('inc.adminfooter')
		