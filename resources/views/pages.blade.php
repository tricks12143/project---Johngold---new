
	@if(count($pagemains1) > 0)
		@foreach($pagemains1->all() as $pagemain)
			@include($pagemain->template)
		@endforeach
	@endif
