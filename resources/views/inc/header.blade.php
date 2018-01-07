<!DOCTYPE html>

@if(empty(session()->get('user')))
	<?php
		session()->put('user', 'user')
	?>	
@endif


<html lang="en">
	<head>
		<title>JohnGold</title>
		
		<!--Bootstrap 4.0 Beta-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

	    <link rel="stylesheet" type="text/css" href="{{ asset('css/johngold-style.css') }}" />

	    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination.css') }}" />

	    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	    <script type="text/javascript" src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/jqBootstrapValidation.js') }}"></script>
		<script type="text/javascript" src="{{ url('js/pagination.js') }}"></script>

		<meta name="csrf_token" content="{ csrf_token() }" />
	</head>

	<body>
		

	@if(count($pagemains1) > 0)
	   	@foreach($pagemains1 as $pagemain)
			<?php $pageidme = $pagemain->page_id;?>		
	    @endforeach
	@endif

		@if(count($contentsubs) > 0)
    		@foreach($contentsubs as $contentsub)
    			@if(count($contentsub->the_content) > 0)
    				@if($contentsub->page_id == $pageidme)
	    				@if($contentsub->content_name == "Navigation")
	    					<?php
	    						$strname = "";
	    					?>
	    					@foreach($contentmains as $contentmain)
	    						@if($contentmain->content_name == "Navigation")
	    							<?php
			    						$strname = $contentmain->defaultvalue;
			    					?>
	    						@endif
	    					@endforeach
	     					<?php 
	     					$contentpath = 'blocks' .'.'. $strname . '.templates.' . $contentsub->the_content . '.view';
	     					
	     					?>
	     					@include($contentpath)
	    				@endif
    				@endif
          		@endif
    		@endforeach
    	@endif


