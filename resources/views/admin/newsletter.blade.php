@include('inc.adminheader')
	<input type="hidden" id="refresh" value="no">
	<section class="johngold-dashboard">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					  	<h5>News Letter List
					  	<a href="#" style="float:right" data-toggle="modal" data-target="#menumodal">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a>
						</h5>
					  </div>
					  <div class="panel-body">

					  	@if(session('info'))
						  	<div class="alert alert-success">
						  		{{session('info')}}
						  	</div>
					  	@endif

					  	@if(count($pagemains) > 0)
							@foreach($pagemains->all() as $pagemain)
								@if(count($pagetypes) > 0)
									@foreach($pagetypes as $pagetype)
										@if($pagetype->page_category == "Newsletter")
											@if($pagemain->pagetype_id == $pagetype->id)
												<div class="johngold-minipanels">

															<div class="row">
																<div class="col col-md-12">
																	<div class="johngold-minipanels-body" style="height:34px">
																		<div class="johngold-minipanels-body-left" style="padding:5px">
																			<a href="#">
																				<input type="hidden" name="id" id="id" value="{{ $pagemain->page_id }}">
																			<h6>
																				{{ $pagemain->name }}
																			</h6>
																			</a>
																			<?php
																		
																				echo '<p> Template: ';
																				echo $pagemain->template;
																				echo '</p>';
																			
																			?>
																					
																		</div>
																<a href='{{ url("/deletemenunews/{$pagemain->page_id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
																	<div class="johngold-minipanels-body-right-delete" style="padding:5px 0">
																						
																		<i class="fa fa-trash" aria-hidden="true"></i>
																						
																	</div>
																</a>

																<a href='{{ url("/dashboard/updatenewletter/{$pagemain->page_id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
																	<div class="johngold-minipanels-body-right"style="padding:5px 0">
																						
																		<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
																						
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											@endif
										@endif
									@endforeach
								@endif
							@endforeach
						@endif
					  	
					  </div>
					</div>
				</div>

				<!-- Modal -->
				  <div class="modal fade" id="menumodal" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <h4 class="modal-title">Menu Form</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        <div class="modal-body">
				          	<form class="form-horizontal" method="POST" action="{{ url('/insertnews') }}">
				          		@if(count($pagemains) > 0)
				          			@foreach($pagemains->all() as $pagemain)
				          				<?php
				          					$page_id = $pagemain->page_id + 1;
				          				?>
				          			@endforeach
				          			<input type="hidden" class="form-control" id="menuid" name="menuid" value="<?php echo $page_id; ?>">
				          		@else
				          			<input type="hidden" class="form-control" id="menuid" name="menuid" value="1">
				          		@endif
				          		{{csrf_field()}}
								  <fieldset>
								  	@if(count($errors) > 0)
								  		@foreach($errors->all() as $error)
								  			<div class="alert alert-danger">
								  				{{$error}}
								  			</div>
								  		@endforeach
								  	@endif
								    <div class="form-group">
								      <label for="name" class="col-lg-3 control-label">Name</label>
								      <div class="col-lg-9">
								        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
								      </div>
								    </div>

								    <div class="form-group">
								      <label for="Slug" class="col-lg-3 control-label">Page Template</label>
								      <div class="col-lg-9">
								        <input type="text" class="form-control" id="template" name="template" placeholder="Template" value="news" readonly>
								      </div>
								    </div>

								    <div class="form-group">
								      <label for="parent" class="col-lg-3 control-label">Select Parent:</label>
								      <div class="col-lg-9">
									      <select class="form-control" id="parent" name="parent" disabled>
									      	<option value="">None</option>
									      	@if(count($pagemains) > 0)
												@foreach($pagemains->all() as $pagemain)
													
														<option value="{{ $pagemain->page_id }}">{{ $pagemain->name }}</option>
													
												@endforeach
											@endif
									        
									      </select>
									      <span class="help-block">(Optional) Only select if you want your page under a certain area.</span>
									  </div>
									</div>

									<div class="form-group">
								      <label for="parent" class="col-lg-3 control-label">Select Page Category:</label>
								      <div class="col-lg-9">
									      <select class="form-control" id="category" name="category">
									      	@if(count($pagetypes) > 0)
												@foreach($pagetypes->all() as $pagetype)
													@if($pagetype->page_category == "Newsletter")
														<option value="{{ $pagetype->id }}">{{ $pagetype->page_category }}</option>
													@endif
												@endforeach
											@endif
									        
									      </select>
									  </div>
									</div>
								    
								    <div class="form-group">
								      <div class="col-lg-10 col-lg-offset-2">
								        <button type="submit" name="submit_task" class="btn btn-primary" id="btnsubmit">Submit</button>
								      </div>
								    </div>
								  </fieldset>
							</form>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>
			</div>
		</div>
	</section>

@include('inc.adminfooter')