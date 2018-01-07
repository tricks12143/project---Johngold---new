@include('inc.adminheader')
<?php
	$userid = "";
	$stat = "";
	$level = "";
?>
	@if(count($userss) > 0)
		@foreach($userss as $user)
			<?php
				$userid = $user->id;
				$stat = $user->stat;
				$level = $user->level;
			?>
		@endforeach
	@endif
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/edituserstat', $userid) }}">
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
			  <label class="col-lg-1 control-label">Level:</label>
			  <div class="col-lg-2">
				  <select class="form-control" name="level">
				  	<option value="{{ $level }}">{{ $level }} (Current)</option>
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				  </select>
				</div>
			</div>

			<div class="form-group">
			  <label class="col-lg-1 control-label">Status:</label>
			  <div class="col-lg-2">
				  <select class="form-control" name="status">
				  	<option value="{{ $stat }}">{{ $stat }} (Current)</option>
				    <option value="active">Active</option>
				    <option value="inactive">Disable</option>
				  </select>
				</div>
			</div>
			    
			<div class="form-group">
			    <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" name="submit" class="btn btn-primary">Update</button>
			        <a href="{{ url('/dashboard/staff') }}" class="btn btn-danger"> Back</a>
			    </div>
			</div>
		</fieldset>
	</form>

@include('inc.adminfooter')