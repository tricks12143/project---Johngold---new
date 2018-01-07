
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
    <header class="masthead" style="background-image:url({{ URL::asset('img/gallery') .'/'. $hdbg }});">
      <div class="container">
        <div class="intro-text">
        	
    	@if(count($contentsubs) > 0)
    		@foreach($contentsubs as $contentsub)
	    		@if($contentsub->page_id == $pageidme)
	    			@if($contentsub->content_name == "Logo")
		    		<div class="row justify-content-md-center">
		        		<div class="col col-md-5">
		        			<img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" class="img-responsive logo"/>
		        		</div>
		        	</div>
		        	@endif
	        	@endif
        	@endforeach
    	@endif
        @if(count($contentsubs) > 0)
    		@foreach($contentsubs as $contentsub)
    			@if($contentsub->page_id == $pageidme)
    				@if($contentsub->content_name == "Title")
    					
	    					<div class="intro-lead-in">
	    					{{ $contentsub->the_content }}
	    					</div>
    					
    				@endif
    			
          		
          			@if($contentsub->content_name == "Description")
          				
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
          
          <a class="btn btn-xl js-scroll-trigger jg-btn" href="#services">Tell Me More</a>
        </div>
      </div>
    </header>

    <section class="jg-affiliation-section">
    	<div class="container">
    		<div class="col-lg-12 text-center">
				@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
						@if($contentsub->page_id == $pageidme)
							@if($contentsub->content_name == "Affiliation-title")

			    					<h2 class="section-heading">{{ $contentsub->the_content }}</h2>
			    			@endif
			    			@if($contentsub->content_name == "Affiliation-desc")
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

		    				@if($contentsub->content_name == "Affiliation")
		    					<?php
		    						$strname = "";
		    					?>
		    					@foreach($contentmains as $contentmain)
		    						@if($contentmain->content_name == "Affiliation")
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
	    </div>
    </section>	

    <section class="profile">	
		<div class="container">
			<div class="col-lg-12 text-center">
				@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
						@if($contentsub->page_id == $pageidme)
							@if($contentsub->content_name == "Profile-title")

			    					<h2 class="section-heading">{{ $contentsub->the_content }}</h2>
			    			@endif
			    			@if($contentsub->content_name == "Profile-desc")
									<h3 class="section-subheading text-muted">{{ $contentsub->the_content }}</h3>
			    			@endif
						@endif 	
				    @endforeach
		    	@endif
		    </div>
		    <div class="row">
				@if(count($contentsubs) > 0)
		    		@foreach($contentsubs as $contentsub)
		    			@if($contentsub->page_id == $pageidme)
			    			@if($contentsub->content_name == "Logo")
			    				<div class="col-md-4 jg-profile-img">
				    				<img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" class="img-responsive logo"/>
				        		</div>
			    			@endif
		    			@endif
		        	@endforeach
		    	@endif
		    @if(count($contentsubs) > 0)
		    	@foreach($contentsubs as $contentsub)
			    	@if($contentsub->page_id == $pageidme)
						@if($contentsub->content_name == "Profile-body")

						        <div class="col-md-8">
						        	<div class="jg-profile-body">
							        	<p>
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
				          					
				    						
								        </p>
									</div>
						        </div>
								
							
				    	@endif
				    @endif
			  	@endforeach
		    @endif
			</div>
			
		</div>
	</section>

    <section class="services" id="services">
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

	<!--
	<section class="gallery">
		<div class="col-lg-12 text-center">
			<h2 class="section-heading">Gallery</h2>
	        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
	    </div>
		<div class="row justify-content-md-center">

				<div class="container">
					<div class="row">
						<div class="col-md-4">
			                <div class="jg-thumbnail">
			                        <a href="#" class="jg-thumbnail-icon">
			                            <img class="img-responsive" src="{{ URL::asset('img/icon/increasing10.png') }}">
			                        </a>
			                        <div class="jg-thumbnail-image">
			                            <img class="img-responsive" src="{{ URL::asset('img/Allen_Real_img4.png') }}">
			                        </div>
			                        <div class="jg-caption">
			                            <h1><a href="#">Economic Growth</a></h1>
			                            
			                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			                        </div>
			                </div>
			            </div>

			            <div class="col-md-4">
			                <div class="jg-thumbnail">
			                        <a href="#" class="jg-thumbnail-icon">
			                            <img class="img-responsive" src="{{ URL::asset('img/icon/briefcase11.png') }}">
			                        </a>
			                        <div class="jg-thumbnail-image">
			                            <img class="img-responsive" src="{{ URL::asset('img/Allen_Real_img2.png') }}">
			                        </div>
			                        <div class="jg-caption">
			                            <h1><a href="#">Business Partnership</a></h1>
			                            
			                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			                        </div>
			                </div>
			            </div>

			            <div class="col-md-4">
			                <div class="jg-thumbnail">
			                        <a href="#" class="jg-thumbnail-icon">
			                            <img class="img-responsive" src="{{ URL::asset('img/icon/sitemap1.png') }}">
			                        </a>
			                        <div class="jg-thumbnail-image">
			                            <img class="img-responsive" src="{{ URL::asset('img/Allen_Real_img5.png') }}">
			                        </div>
			                        <div class="jg-caption">
			                            <h1><a href="#">Happening City</a></h1>
			                            
			                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			                        </div>
			                </div>
			            </div>
			        </div>
		        </div>
	        
        </div>
	</section>
	-->

	

	<section class="team">	
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

	<!--<div class="wrapper">
	  <div class="container">
	    
	    <div class="row">
	      <div class="col-sm-12">
	        <h1>jQuery Bootpag Pagination Example</h1>
	        <p>Showcaes the jQueyr Bootpag pagination JS library for creating simple, quick JS based pagination.</p>
	        <p id="pagination-here"></p>
	        <p id="content">Dynamic page content</p>
	      </div>
	    </div>
	  </div>
	</div>-->


	<input type="hidden" id="blocknum" value="{{ $numblocks }}">

<!--@include('inc.chat')-->
<!--<input type="hidden" id="hostme" value="{{ url('/') }}">--> <!-- base_path() -->
	<!--<form class="form-horizontal" id="testchat" enctype="multipart/form-data">
        
        <input type="text" name="chat"/>
        
      	<button type="submit" class="btn btn-primary">Save</button>
    </form>
    <div id ="dd"></div>-->
            <!-- Trigger the modal with a button -->


@include('inc.chat')
@include('inc.contactfooter')
@include('inc.footer')
		