
@include('inc.adminheader')

	<h2>
		{{ $comments->title }}
	</h2>
	<p>
		{{ $comments->comment }}
	</p>

	<a href="{{ url('/dashboard') }}" class="btn btn-danger"> Back</a>

@include('inc.adminfooter')