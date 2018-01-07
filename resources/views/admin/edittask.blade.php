@include('inc.adminheader')
<input type="hidden" id="refresh" value="no">
	<form class="form-horizontal" method="POST" action="{{ url('/edittask', array($articles->id)) }}">
		{{csrf_field()}}
		<fieldset>
		    <div class="form-group">
		    	<input type="hidden" id="id" name="id" value="<?php echo $articles->id; ?>">
		    	@if(count($errors) > 0)
					@foreach($errors->all() as $error)
						<div class="alert alert-danger">
							  {{$error}}
						</div>
					@endforeach
				@endif
		    	<label for="inputEmail" class="col-lg-2 control-label">Title</label>
				<div class="col-lg-10">
				    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $articles->title; ?>">
				</div>
			</div>
			<div class="form-group">
			    <label for="textArea" class="col-lg-2 control-label">Description</label>
			    <div class="col-lg-10">
			    	<textarea class="form-control" rows="3" id="description" name="description"><?php echo $articles->description; ?></textarea>
					    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
				</div>
			</div>
			    
			<div class="form-group">
			    <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" name="submit_task" class="btn btn-primary">Update</button>
			        <a href="{{ url('/dashboard') }}" class="btn btn-danger"> Back</a>
			    </div>
			</div>
		</fieldset>
	</form>

@include('inc.adminfooter')