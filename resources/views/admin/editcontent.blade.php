@include('inc.adminheader')
<input type="hidden" id="refresh" value="no">
	@if(count($contentmains) > 0)
		@foreach($contentmains->all() as $contentmain)
			<form class="form-horizontal" method="POST" action="{{ url('/editcontent', $contentmain->content_id) }}">
				{{csrf_field()}}
				<fieldset>
				    <div class="form-group">
				    	<input type="hidden" id="id" name="id" value="<?php echo $contentmain->content_id; ?>">
				    	@if(count($errors) > 0)
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									  {{$error}}
								</div>
							@endforeach
						@endif

				    	<label for="inputEmail" class="col-lg-2 control-label">Type</label>
						<div class="col-lg-10">
						    <input type="text" class="form-control" id="title" name="title" placeholder="Name" value="<?php echo $contentmain->content_name; ?>">
						</div>
					</div>

					<div class="form-group">
							<label for="parent" class="col-lg-2 control-label">Select Type:</label>
							<div class="col-lg-10">
							    <select class="form-control" id="type" name="type" onchange="getComboA(this)">
							    	<option value="{{$contentmain->type}}">{{$contentmain->type}}</option>
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
						      	<option value="{{$contentmain->defaultvalue}}">{{$contentmain->defaultvalue}}</option>

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
					        <button type="submit" name="submit_task" class="btn btn-primary">Update</button>
					        <a href="{{ url('/dashboard/setup') }}" class="btn btn-danger"> Back</a>
					    </div>
					</div>
				</fieldset>
			</form>

		@endforeach
	@endif
	

@include('inc.adminfooter')