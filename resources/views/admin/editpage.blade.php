@include('inc.adminheader')
	@if(count($pagemains) > 0)
		@foreach($pagemains->all() as $pagemain)
			<?php
				$paid = $pagemain->page_id;
				$pagename = $pagemain->name;
				$pagetemplate = $pagemain->template;
			?>
		@endforeach
	@endif
	<input type="hidden" id="refresh" value="no">
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/editpage', $paid) }}">
		{{csrf_field()}}
		<fieldset>
		    <div class="form-group">
		    	<input type="hidden" id="id" name="id" value="<?php echo $paid; ?>">
		    	@if(count($errors) > 0)
					@foreach($errors->all() as $error)
						<div class="alert alert-danger">
							  {{$error}}
						</div>
					@endforeach
				@endif
		    	<label for="inputEmail" class="col-lg-2 control-label">Name</label>
				<div class="col-lg-10">
				    <input type="text" class="form-control" id="title" name="title" placeholder="Name" value="<?php echo $pagename; ?>">
				</div>
			</div>
			<div class="form-group">
			    <label for="textArea" class="col-lg-2 control-label">Page Template</label>
			    <div class="col-lg-10">
			    	<input class="form-control" rows="3" id="comment" name="comment" placeholder="Page template" value="<?php echo $pagetemplate; ?>">
			    </div>
			</div>

			<div class="form-group">
				<label for="parent" class="col-lg-2 control-label">Select Parent:</label>
				<div class="col-lg-10">
				    <select class="form-control" id="parent" name="parent">
				    	@if(count($pagemainsss) > 0)
				    		@foreach($pagemainsss->all() as $pagemain)
				    			<option value="<?php echo $pagemain->page_id?>"><?php echo $pagemain->name?></option>
				    		@endforeach
				    	@endif
				      	<option value="">None</option>
				     	@if(count($pagemainss) > 0)
							@foreach($pagemainss->all() as $pagemain)
								<option value="{{ $pagemain->page_id }}">{{ $pagemain->name }}</option>
							@endforeach
						@endif
							        
				    </select>
				    <span class="help-block">(Optional) Only select if you want your page under a certain area.</span>
				</div>
			</div>

			<div class="form-group">
				<label for="parent" class="col-lg-2 control-label">Select Page Category:</label>
				<div class="col-lg-10">
				    <select class="form-control" id="category" name="category">
				    	@if(count($pagemains) > 0)
							@foreach($pagemains->all() as $pagemain)
							{{ $pagemain->pagetype_id }}
							    @if(count($pagetypes) > 0)
									@foreach($pagetypes->all() as $pagetype)

										@if($pagemain->pagetype_id == $pagetype->id)
											<option value="{{ $pagetype->id }}">{{ $pagetype->page_category }}</option>
										@endif
									@endforeach
								@endif
							@endforeach
						@endif
				     	<option value="0">None</option>
				      	@if(count($pagetypes) > 0)
							@foreach($pagetypes->all() as $pagetype)
								<option value="{{ $pagetype->id }}">{{ $pagetype->page_category }}</option>
							@endforeach
						@endif
									        
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="parent" class="col-lg-2 control-label">Contents:</label>

					<a href="#" data-toggle="modal" data-target="#myModal">Manage Contents</a>
				<div class="col-lg-10">

				    <?php
				    	$cnt = 0;
				    ?>
					@if(count($contentsubs) > 0)
		                @foreach($contentsubs->all() as $contentsub)

		                    @if(count($contentmains) > 0)
		                        @foreach($contentmains->all() as $contentmain)

		                            @if($contentmain->content_id == $contentsub->content_id)
		                            	@if($contentmain->type == "text")
		                            	<div class="row jg-margin-bot">
		                            		<input type="hidden" name="consubid[]" value="{{ $contentsub->id }}">
			                            	<label for="area3{{ $contentsub->id }}" class="col-lg-2 control-label">{{ $contentmain->content_name }}</label>
			                            	<div class="col-lg-10">
	                                            <input type="text" class="form-control" id="" name="{{ $contentsub->id }}" placeholder="{{ $contentmain->content_name }}" value="{{ $contentsub->the_content }}">
	                                        </div>
	                                    </div>
                                        @elseif($contentmain->type == "paragraph")
                                        <div class="row jg-margin-bot">

                                        	<input type="hidden" name="consubid[]" value="{{ $contentsub->id }}">
                                        	<label for="area3{{ $contentsub->id }}" class="col-lg-2 control-label">{{ $contentmain->content_name }}</label>
	                                        <div class="col-lg-10">
	                                            <div class="jg-texteditor">
	                                                <textarea class="jg-page-textarea" name="{{ $contentsub->id }}" id="area3{{ $cnt }}" style="width: 100%; height: 200px;">
	                                                    <?php
	                                                    $file = $contentmain->content_name;
	                                                    $path = 'jgcontents.page' .$pagemain->page_id . '.' . $file;
	                                                    ?>
	                                                    @if(count($contentmain->content_name) > 0)
	                                                        @include($path)
	                                                    @endif
	                                                      
	                                                </textarea>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <?php 
	                                    	$cnt++;
	                                    ?>
                                        @elseif($contentmain->type == "image")
                                        <div class="row jg-margin-bot">
                                        <input type="hidden" name="consubid[]" value="{{ $contentsub->id }}">
                                        <label for="area3{{ $contentsub->id }}" class="col-lg-2 control-label">{{ $contentmain->content_name }}</label>
	                                        <div class="col-lg-10">
	                                            <input type="file" class="form-control" id="area3{{ $contentsub->id }}" name="{{ $contentsub->id }}" onchange="readURL(this);">
	                                                <img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" id="previewpic" class="img-responsive logo" width="200" height="200"/>
                                        	</div>
                                        </div>
                                        @elseif($contentmain->type == "block")
                                            
                                        @endif
									@endif
		                           
		                        @endforeach
		                    @endif

		                @endforeach
		            @endif
		            <input type="hidden" id="textcount" value="{{ $cnt }}">
				</div>
			</div>

			

			<div class="form-group">
			    <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" name="submit_task" class="btn btn-primary">Update</button>
			        <a href="{{ url('/dashboard/pages') }}" class="btn btn-danger"> Back</a>
			    </div>
			</div>
		</fieldset>
	</form>


	<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body">
			      	<form class="form-horizontal" method="POST" action="{{ url('/dashboard/updatecontentvalue') }}">
			      		<div class="row">
			      			{{csrf_field()}}
			        				@if(count($pagemains) > 0)
                                        @foreach($pagemains->all() as $pagemain)
                                            <input type="hidden" name="pgi" id="pgi" value="{{ $pagemain->page_id }}">
                                        @endforeach
                                    @endif
                                    <?php
                                        $ch = "";
                                    ?>
                                    @if(count($contentmains) > 0)
                                        @foreach($contentmains->all() as $contentmain)
                                        <?php $ch = "";?>
                                            @if(count($contentsubs) > 0)
                                                @foreach($contentsubs->all() as $contentsub)

                                                    @if($contentsub->content_id == $contentmain->content_id)
                                                        <?php
                                                            $ch = 'checked';
                                                        ?>
                                                    @endif
                                                @endforeach
                                            @else

                                                <?php
                                                    $ch = "";
                                                ?>

                                            @endif
                                            <div class="col col-md-4">
	                                            <input id="{{ $contentmain->content_id }}" name="typecontents[]" type="checkbox" class="johngold-edit-page-checkbox" value="{{ $contentmain->content_id }}"{{ $ch }}/>
	                                            <label for="{{ $contentmain->content_id }}" class="johngold-edit-page-label">{{ $contentmain->content_name }}</label>
	                                        </div>
                                        @endforeach
                                    @endif

                    	</div>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-primary" id="btnsubmit">Save</button>
			      </form>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

@include('inc.adminfooter')