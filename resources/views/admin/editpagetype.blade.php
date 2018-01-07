@include('inc.adminheader')
<input type="hidden" id="refresh" value="no">
	@if(count($pagetypes) > 0)
		@foreach($pagetypes->all() as $pagetype)
			<form class="form-horizontal" method="POST" action="{{ url('/editpagetype', $pagetype->id) }}">
				{{csrf_field()}}
				<fieldset>
				    <div class="form-group">
				    	<input type="hidden" id="id" name="id" value="<?php echo $pagetype->id; ?>">
				    	@if(count($errors) > 0)
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									  {{$error}}
								</div>
							@endforeach
						@endif
				    	<label for="inputEmail" class="col-lg-2 control-label">Type</label>
						<div class="col-lg-10">
						    <input type="text" class="form-control" id="title" name="title" placeholder="Name" value="<?php echo $pagetype->page_category; ?>">
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