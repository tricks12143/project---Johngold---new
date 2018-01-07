
@include('inc.adminheader')
<input type="hidden" id="refresh" value="no">
	<section class="johngold-dashboard">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
					  <div class="panel-heading">
					  	<h5>Staff requests</h5>
					  </div>
					  <div class="panel-body">

					  	@if(session('info'))
						  	<div class="alert alert-success">
						  		{{session('info')}}
						  	</div>
					  	@endif

					  	@if(count($users) > 0)
							@foreach($users->all() as $user)
							@if(empty($user->stat))

							
							<div class="johngold-minipanels">

								<div class="row">
									<div class="col col-md-12">
										<div class="johngold-minipanels-body" style="height:34px">
											<div class="johngold-minipanels-body-left" style="padding:5px">
												<a href="#">
													<input type="hidden" name="id" id="id" value="{{ $user->id }}">
												<h6>
													{{ $user->fname . " " . $user->mname . " " . $user->lname }}
												</h6>
												</a>
														
											</div>
									<a href='{{ url("/deleteconfirmation/{$user->id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
										<div class="johngold-minipanels-body-right-delete" style="padding:5px 0">
															
											<i class="fa fa-times" aria-hidden="true"></i>
															
										</div>
									</a>

									<a href='{{ url("/confirm/{$user->id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
										<div class="johngold-minipanels-body-confirm"style="padding:5px 0">
															
											<i class="fa fa-check" aria-hidden="true"></i>
															
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endif
								
							@endforeach
						@endif
					  	
					  </div>
					</div>
				</div>


				<div class="col-md-6">
					<div class="panel panel-default">
					  <div class="panel-heading">
					  	<h5>Staff requests</h5>
					  </div>
					  <div class="panel-body">

					  	@if(session('info'))
						  	<div class="alert alert-success">
						  		{{session('info')}}
						  	</div>
					  	@endif

					  	@if(count($users) > 0)
							@foreach($users->all() as $user)
								@if(!empty($user->stat))

								
								<div class="johngold-minipanels">

											<div class="row">
												<div class="col col-md-12">
													<div class="johngold-minipanels-body" style="height:34px">
														<div class="johngold-minipanels-body-left" style="padding:5px">
															<a href="#">
																<input type="hidden" name="id" id="id" value="{{ $user->id }}">
															<h6>
																{{ $user->fname . " " . $user->mname . " " . $user->lname }}
															</h6>
															</a>
																	
														</div>
												<a href='{{ url("/deletemenu/{$user->id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
													<div class="johngold-minipanels-body-right-delete" style="padding:5px 0">
																		
														<i class="fa fa-trash" aria-hidden="true"></i>
																		
													</div>
												</a>

												<a href='{{ url("/dashboard/updatemystaff/{$user->id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
													<div class="johngold-minipanels-body-right"style="padding:5px 0">
																		
														<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
																		
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
								@endif
								
							@endforeach
						@endif
					  	
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
		

@include('inc.adminfooter')
		