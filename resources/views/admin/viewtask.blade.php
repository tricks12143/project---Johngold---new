
@include('inc.adminheader')

	<h2>
		{{ $articles->title }}
	</h2>
	<p>
		{{ $articles->description }}
	</p>

	<a href="{{ url('/dashboard') }}" class="btn btn-danger"> Back</a>

@include('inc.adminfooter')