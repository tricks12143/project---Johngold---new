@include('inc.adminheader')
<?php
	$userid = "";
	$img = "";
	$lname = "";
	$fname = "";
	$mname = "";
	$email = "";
	$pass = "";
?>
	@if(count($users) > 0)
		@foreach($users as $user)
			<?php
				$userid = $user->id;
				$img = $user->img;
				$lname = $user->lname;
				$fname = $user->fname;
				$mname = $user->mname;
				$email = $user->email;
				$pass = $user->password;
			?>
		@endforeach
	@endif
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/edituser', $userid) }}">
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
		    	<label class="col-lg-1 control-label">Profile Picture:</label>
				<div class="col-lg-4">
				    <img class="jg-staff-img" id="prof_img_preview" src="{{ URL::asset('img/gallery') . "/" . $img }}"/>
				</div>
			</div>
			<div class="form-group">
		    	<label class="col-lg-1 control-label"></label>
				<div class="col-lg-4">
				    <input type="file" class="form-control" id="prof_img" name="img">
				</div>
			</div>
		    <div class="form-group">
		    	<label class="col-lg-1 control-label">Last Name:</label>
				<div class="col-lg-4">
				    <input type="text" class="form-control" id="title" name="lname" placeholder="Last Name" value="{{ $lname }}">
				</div>
			</div>
			<div class="form-group">
		    	<label class="col-lg-1 control-label">First Name:</label>
				<div class="col-lg-4">
				    <input type="text" class="form-control" id="title" name="fname" placeholder="First Name" value="{{ $fname }}">
				</div>
			</div>
			<div class="form-group">
		    	<label class="col-lg-1 control-label">Middle Name:</label>
				<div class="col-lg-4">
				    <input type="text" class="form-control" id="title" name="mname" placeholder="MIddle Name" value="{{ $mname }}">
				</div>
			</div>
			<div class="form-group">
		    	<label class="col-lg-1 control-label">Email:</label>
				<div class="col-lg-4">
				    <input type="text" class="form-control" id="title" name="email" placeholder="Email Address" value="{{ $email }}">
				</div>
			</div>
			    
			<div class="form-group">
			    <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" name="submit" class="btn btn-primary">Update</button>
			        <a href="{{ url('/dashboard') }}" class="btn btn-danger"> Back</a>
			    </div>
			</div>
		</fieldset>
	</form>

@include('inc.adminfooter')