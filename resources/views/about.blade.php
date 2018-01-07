
@include('inc.header')

<?php
	$hdbg = "";
	$numblocks = 0; //number of blocks. to use for identification
?>
@if(count($contentsubs) > 0)
    @foreach($contentsubs as $contentsub)
    	@if($contentsub->content_name == "Header Background")
    		<?php
				$hdbg = $contentsub->the_content;
			?>  
    	@endif
	@endforeach
@endif
<?php $pageidme = "";?>
@if(count($pagemains1) > 0)
   	@foreach($pagemains1 as $pagemain)
		<?php $pageidme = $pagemain->page_id;?>		
    @endforeach
@endif
	
	<!-- Header -->
    <header class="masthead jg-other-header" style="background-image:url({{ URL::asset('img/gallery') .'/'. $hdbg }});">
      <div class="container">
        
        @if(count($contentsubs) > 0)
    		@foreach($contentsubs as $contentsub)
    			@if($contentsub->page_id == $pageidme)
    				@if($contentsub->content_name == "Title")
    					<div class="intro-text">
				          <div class="intro-lead-in">{{ $contentsub->the_content }}</div>
				        </div>
				    @endif
    			@endif
    		@endforeach
    	@endif
      </div>
    </header>

    <section class="jg-about-us">
    	<div class="container">
    		<div class="row">
    			<div class="col col-md-12">
    				<div class="jg-about-content jg-about">

    					@if(count($contentsubs) > 0)
				    		@foreach($contentsubs as $contentsub)
								@if($contentsub->page_id == $pageidme)
									@if($contentsub->content_name == "Profile-title")
									 	<div class="jg-about-title">
											<h3>{{ $contentsub->the_content }}</h3>
					    				</div>
					    			@endif
								@endif 	
						    @endforeach
				    	@endif

				    	@if(count($contentsubs) > 0)
					    	@foreach($contentsubs as $contentsub)
						    	@if($contentsub->page_id == $pageidme)
						    		@if($contentsub->content_name == "Profile-img")
						        		<div class="jg-about-img">
						    				<img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" class="img-responsive pull-left"/>
						    			</div>
					    			@endif

									@if($contentsub->content_name == "Profile-body")

											        	<?php
							          						$file = $contentsub->content_name;
							          					?>
							          					@if(count($pagemains1) > 0)
							    							@foreach($pagemains1 as $pagemain)
							    								<?php
									          						$path = 'jgcontents.page' .$pagemain->page_id . '.' . $file;
									          					?>
									          					@include($path)
							    							@endforeach
							    						@endif
							          					
							    						
											
										
							    	@endif
							    @endif
						  	@endforeach
					    @endif
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="about-us-services">
		<div class="col-lg-12 text-center">
			@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
						@if($contentsub->page_id == $pageidme)
							@if($contentsub->content_name == "Services-title")

			    					<h2 class="section-heading">{{ $contentsub->the_content }}</h2>
			    			@endif
			    			@if($contentsub->content_name == "Services-description")
									<h3 class="section-subheading text-muted">{{ $contentsub->the_content }}</h3>
			    			@endif
						@endif 	
				    @endforeach
		    	@endif
	    </div>

	    @if(count($contentsubs) > 0)
	    	@foreach($contentsubs as $contentsub)
	    		@if(count($contentsub->the_content) > 0)
	    			@if($contentsub->page_id == $pageidme)

		   				@if($contentsub->content_name == "Services")
		    					<?php
		    						$strname = "";
		    					?>
		    					@foreach($contentmains as $contentmain)
		    						@if($contentmain->content_name == "Services")
		    							<?php
				    						$strname = $contentmain->defaultvalue;
				    					?>
		    						@endif
		    					@endforeach
		     					<?php 

		     					
		     					$contentpath = 'blocks' .'.'. $strname . '.templates.' . $contentsub->the_content . '.view';
		     					
		     					?>
		     					@include($contentpath)

		     					<?php $numblocks++; ?>
		   				@endif
	    			@endif
	       		@endif
	    	@endforeach
	    @endif

				
	</section>

	<section class="about-us-team">	
		<div class="container">

			<div class="col-lg-12 text-center">
				@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
						@if($contentsub->page_id == $pageidme)
							@if($contentsub->content_name == "Section-four-title")

			    					<h2 class="section-heading">{{ $contentsub->the_content }}</h2>
			    			@endif
			    			@if($contentsub->content_name == "Section-four-description")
									<h3 class="section-subheading text-muted">{{ $contentsub->the_content }}</h3>
			    			@endif
						@endif 	
				    @endforeach
		    	@endif
		    </div>

				@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
		    			@if(count($contentsub->the_content) > 0)
		    				@if($contentsub->page_id == $pageidme)

			    				@if($contentsub->content_name == "Teamviewer")
			    					<?php
			    						$strname = "";
			    					?>
			    					@foreach($contentmains as $contentmain)
			    						@if($contentmain->content_name == "Teamviewer")
			    							<?php
					    						$strname = $contentmain->defaultvalue;
					    					?>
			    						@endif
			    					@endforeach
			     					<?php
			     					
			     					$contentpath = 'blocks' .'.'. $strname . '.templates.' . $contentsub->the_content . '.view';
			     					
			     					?>
			     					@include($contentpath)
			     					<?php
			     						//$numblocks++;
			     					?>
			    				@endif
		    				@endif
		          		@endif
		    		@endforeach
		    	@endif

				
				
			</div>
	</section>
@include('inc.chat')
@include('inc.contactfooter')	
@include('inc.footer')
		