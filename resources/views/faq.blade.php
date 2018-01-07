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
    			@endif
    		@endforeach
    	@endif
        </div>
      </div>
    </header>
	<section class="jg-faq-middle">
    	<div class="container">
    		<div class="jg-faq-middle-body">
    			<div class="jg-faq-middle-body-mid">
		    		@if(count($contentsubs) > 0)
			    		@foreach($contentsubs as $contentsub)
			    			@if($contentsub->page_id == $pageidme)
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
			    </div>
		    </div>
	    </div>
    </section>

@include('inc.chat')
@include('inc.contactfooter')
@include('inc.footer')
		