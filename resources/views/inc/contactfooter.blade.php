<footer class="footer">
		<div class="container">
			

		@if(count($contentsubs) > 0)
    		@foreach($contentsubs as $contentsub)
    			@if($contentsub->page_id == $pageidme)
    				@if($contentsub->content_name == "Contact-section-title")
    					
    					<div class="col-lg-12 text-center">
							<h4 class="section-heading">{{ $contentsub->the_content }}</h4>
					    </div>
    					
    				@endif
    			@endif
    		@endforeach
    	@endif

		    <div class="content">
		    	@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
		    			@if($contentsub->page_id == $pageidme)
		          			@if($contentsub->content_name == "Contact-section-paragraph")
		          				
			          				<div class="intro-heading">
			          					<?php
			          						$file = $contentsub->content_name;
			          					?>
			    								<?php
					          						$path = 'jgcontents.page' .$pageidme . '.' . $file;
					          					?>
					          					@include($path)
			                        </div>
		    				@endif
		    			@endif
		    		@endforeach
		    	@endif
			    <!--
			    <div class="jg-contact-mid">
			    	<a class="btn btn-primary jg-btn-invert" href="contact.php">Email Us</a>
			    </div>
				-->
			    <ul class="list-inline social-buttons">
					<li class="list-inline-item">
					    <a href="#">
							<i class="fa fa-twitter"></i>
					    </a>
					</li>
					<li class="list-inline-item">
					    <a href="#">
					        <i class="fa fa-facebook"></i>
					    </a>
					</li>
					<li class="list-inline-item">
					    <a href="#">
							<i class="fa fa-linkedin"></i>
					    </a>
					</li>
				</ul>
				@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
			    		@if($contentsub->page_id == $pageidme)
			    			@if($contentsub->content_name == "Contact-logo")
			    			<div class="row justify-content-md-center">
								<div class="col-sm-2">
									<div class="jg-company-logo">
										<img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" class="img-responsive logo"/>
									</div>
								</div>
							</div>
				        	@endif
			        	@endif
		        	@endforeach
		    	@endif
				
			</div>
		</div>
	</footer>