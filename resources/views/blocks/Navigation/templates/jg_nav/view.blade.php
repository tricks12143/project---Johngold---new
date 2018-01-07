<!-- Navigation -->
		    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav"
		    <?php
		    	$num = 0;
		    	if(count($editpermission) > 0){
		    		if($editpermission){
		    			echo 'style="top:60px; position:sticky;padding-top:0;padding-bottom:0;"';
		    		}
		    	}
		    ?>
		    >
		    @if(count($contentsubs) > 0)
    			@foreach($contentsubs as $contentsub)
    				@if($contentsub->page_id == $pageidme)
    					@if($contentsub->content_name == "Navigation")
		    				<?php
		    					$convalshows = explode(",",$contentsub->content_show);

		    				?>
		    			@endif
    				@endif
    			@endforeach
    		@endif
		      <div class="container">
		      	@if(count($editpermission) > 0)
		      		@if($editpermission)
		      			@if(count($pagemains) > 0)
							@foreach($pagemains->all() as $pagemain)
								@foreach($convalshows as $convalshow)
									@if($pagemain->pagetype_id == $convalshow)
										<?php

											if($num == 0){
												?>
												<a class="navbar-brand js-scroll-trigger" href='{{ url("/dashboard/editpage/{$pagemain->page_id}") }}'>JOHN GOLD</a>
												<?php
											}
										?>
			      					<?php $num++; ?>
									@endif
								@endforeach
								
								
		      				@endforeach
		      			@endif
		      		@else
		      			<a class="navbar-brand js-scroll-trigger" href='{{ url("/") }}'>JOHN GOLD</a>
		      		@endif
		      	@endif
		        
		        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		          Menu
		          <i class="fa fa-bars"></i>
		        </button>
		        <div class="collapse navbar-collapse" id="navbarResponsive">
		          <ul class="navbar-nav ml-auto">
		          	@if(count($editpermission) > 0)
			          	@if($editpermission)
				          	@if(count($pagemains) > 0)
								@foreach($pagemains->all() as $pagemain)
									<?php $active = "";?>
									@if($pagemain->page_id == $pageidme)
										<?php $active = "active";?>
									@endif
									@foreach($convalshows as $convalshow)
										@if($pagemain->pagetype_id == $convalshow)
											<li class="nav-item">
								              <a class="nav-link js-scroll-trigger {{ $active }}" href='{{ url("/dashboard/editpage/{$pagemain->page_id}") }}'>{{$pagemain->name}}</a>
								            </li>
								        @endif
								    @endforeach
								@endforeach
							@endif
						@else
							@foreach($pagemains->all() as $pagemain)
								<?php $active = "";?>
									@if($pagemain->page_id == $pageidme)
										<?php $active = "active";?>
									@endif
								@foreach($convalshows as $convalshow)
									
									@if($pagemain->pagetype_id == $convalshow)
										<li class="nav-item">
								            <a class="nav-link js-scroll-trigger {{ $active }}" href='{{ url("/pages/{$pagemain->page_id}") }}'>{{$pagemain->name}}</a>
								        </li>
								    @endif
								@endforeach
							@endforeach
						@endif
					@endif
		          </ul>
		        </div>
		      </div>
		    </nav>