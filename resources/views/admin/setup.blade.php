
@include('inc.adminheader')
	<input type="hidden" id="refresh" value="no">
	<section class="johngold-setup">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					  	<h5>Contents
					  	<a href="#" style="float:right" data-toggle="modal" data-target="#contentmodal">
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

					  	@if(count($contentmains) > 0)
							@foreach($contentmains->all() as $contentmain)
							<div class="johngold-minipanels">

								<div class="row">
									<div class="col col-md-12">
										<div class="johngold-minipanels-body" style="height:34px">
											<div class="johngold-minipanels-body-left" style="padding:5px">
												<a href="#">
													<input type="hidden" name="id" id="id" value="{{ $contentmain->content_id }}">
												<h6>
													{{ $contentmain->content_name }}
												</h6>
												</a>
												<?php
											
													echo '<p> Type: ';
													echo $contentmain->type;
													echo '</p>';
												
												?>
														
											</div>
									<a href='{{ url("/deletecontent/{$contentmain->content_id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
										<div class="johngold-minipanels-body-right-delete" style="padding:5px 0">
															
											<i class="fa fa-trash" aria-hidden="true"></i>
															
										</div>
									</a>

									<a href='{{ url("/dashboard/updatecontent/{$contentmain->content_id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
										<div class="johngold-minipanels-body-right"style="padding:5px 0">
															
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
															
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
								
							@endforeach
						@endif
					  	
					  </div>
					</div>
				</div>

				<!-- Modal -->
				  <div class="modal fade" id="contentmodal" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <h4 class="modal-title">Content Form</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        <div class="modal-body">
				          	<form class="form-horizontal" method="POST" action="{{ url('/insertcontent') }}">
				          		
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
								      <label for="name" class="col-lg-2 control-label">Name</label>
								      <div class="col-lg-10">
								        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
								      </div>
								    </div>

								    <div class="form-group">
								      <label for="type" class="col-lg-2 control-label">Select Type:</label>
								      <div class="col-lg-10">
									      <select class="form-control" id="type" name="type" onchange="getComboA(this)">
									      	<option value="">Please select a type</option>
									        <option value="text">Text</option>
									        <option value="paragraph">Paragraph</option>
									        <option value="image">Image</option>
									        <option value="block">Block</option>
									      </select>
									  </div>
									</div>

									<div class="form-group" id="blocks-type" style="display:none">
								      <label for="parent" class="col-lg-2 control-label">Select from block list:</label>
								      <div class="col-lg-10">
									      <select class="form-control" id="block_list" name="block_list">
									      	<option value="">Please select a block</option>

									      	<?php
					
												$blocks = array_map('basename', File::directories('../resources/views/blocks'));
												foreach ($blocks as $block) {
													?>
														<option value="{{ $block }}">{{ $block }}</option>
													<?php
												}
							
											?>

									      </select>
									  </div>
									</div>
								    
								    <div class="form-group">
								      <div class="col-lg-10 col-lg-offset-2">
								        <button type="submit" name="submit_task" class="btn btn-primary">Submit</button>
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

				  <!-- Page Category -->

				  <div class="col-md-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					  	<h5>Page Category
					  	<a href="#" style="float:right" data-toggle="modal" data-target="#pagetypemodal">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a>
						</h5>
					  </div>
					  <div class="panel-body">

					  	@if(session('infopagetype'))
						  	<div class="alert alert-success">
						  		{{session('infopagetype')}}
						  	</div>
					  	@endif

					  	@if(count($pagetypes) > 0)
							@foreach($pagetypes->all() as $pagetype)
							<div class="johngold-minipanels">

								<div class="row">
									<div class="col col-md-12">
										<div class="johngold-minipanels-body" style="height:34px">
											<div class="johngold-minipanels-body-left" style="padding:5px">
												<a href="#">
													<input type="hidden" name="id" id="id" value="{{ $pagetype->id }}">
												<h6>
													{{ $pagetype->page_category }}
												</h6>
												</a>														
											</div>
									<a href='{{ url("/deletepagetype/{$pagetype->id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
										<div class="johngold-minipanels-body-right-delete" style="padding:5px 0">
															
											<i class="fa fa-trash" aria-hidden="true"></i>
															
										</div>
									</a>

									<a href='{{ url("/dashboard/updatepagetype/{$pagetype->id}") }}' class="johngold-minipanels-body-right-a" style="font-size:14px;">
										<div class="johngold-minipanels-body-right"style="padding:5px 0">
															
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
															
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
								
							@endforeach
						@endif
					  	
					  </div>
					</div>
				</div>

				<!-- Modal -->
				  <div class="modal fade" id="pagetypemodal" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <h4 class="modal-title">Content Form</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        <div class="modal-body">
				          	<!--<form class="form-horizontal" method="POST" action="{{ url('/insertpagetype') }}">
				          		
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
								      <label for="name" class="col-lg-2 control-label">Type</label>
								      <div class="col-lg-10">
								        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
								      </div>
								    </div>
								    
								    <div class="form-group">
								      <div class="col-lg-10 col-lg-offset-2">
								        <button type="submit" id="submit_pagetype" name="submit_pagetype" class="btn btn-primary">Submit</button>
								      </div>
								    </div>
								  </fieldset>
							</form>-->
							<form class="form-horizontal" method="POST" action="{{ url('/dashboard/insertpagetype') }}">
				          		
				          		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								  <fieldset>
								  	@if(count($errors) > 0)
								  		@foreach($errors->all() as $error)
								  			<div class="alert alert-danger">
								  				{{$error}}
								  			</div>
								  		@endforeach
								  	@endif
								    <div class="form-group">
								      <label for="name" class="col-lg-2 control-label">Type</label>
								      <div class="col-lg-10">
								        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
								      </div>
								    </div>
								    
								    <div class="form-group">
								      <div class="col-lg-10 col-lg-offset-2">
								        <button type="submit" id="submit_pagetype" name="submit_pagetype" class="btn btn-primary">Submit</button>
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
		