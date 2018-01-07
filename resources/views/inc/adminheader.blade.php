<!DOCTYPE html>

@if(empty(session()->get('user')))
	<?php
		session()->put('user', 'staff')
	?>	
@endif

<html>
	<head>
		<title>CMS-JohnGold</title>
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
		<!--Bootstrap 3.3.7-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<!--Bootstrap 4.0 Beta-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

	    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-johngold-style.css') }}" />

	</head>

	<body>
		

			<div class="left johngold-sidenav">
			<a href="{{ url('/dashboard') }}">
				<div class="item">
					<span class="fa fa-th-large"></span>
				</div>
			</a>
			<?php
				$num = 0;
				$ol_stat_color = "";
			?>
			@if(\Auth::user()->level == "3")
				@if(count($pagemains) > 0)
					@foreach($pagemains->all() as $pagemain)
						<?php
						if($num == 0){
							$page_id = $pagemain->page_id;
							?>
							<a href="{{ url('/dashboard/editpage', $page_id) }}">
								<div class="item">
									<span class="fa fa-pencil-square-o"></span>
							    		Start editing
							    </div>
							</a>
							<?php
						}
						 $num++;
						?>
					@endforeach
				@endif
			@endif
			@if(\Auth::user()->ol_stat == "Offline")
				<?php $ol_stat_color = "9a9696";?>
			@else
				<?php $ol_stat_color = "10ff14"; ?>
			@endif

			<?php
				$lname = "";
				$fname = "";
				$mname = "";
				$img = "";
			?>

			@if(count($users) > 0)
				@foreach($users as $user)
					@if($user->id == \Auth::user()->id)
						<?php $fname = $user->fname ?>
						<?php $mname = $user->mname ?>
						<?php $lname = $user->lname ?>
						<?php $img = $user->img ?>
					@endif
				@endforeach
			@endif

			
			<a href="{{ url('/dashboard') }}">
				<div class="item">
					<span class="fa fa-tachometer"></span>
			    		Dashboard
			    </div>
			</a>
			@if(\Auth::user()->level == "3")
			<a href="{{ url('/dashboard/pages') }}">
				<div class="item">
				<span class="fa fa-bars"></span>
				    Page Management
				</div>
			</a>
			<a href="{{ url('/dashboard/setup') }}">
				<div class="item">
				<span class="fa fa-cog"></span>
				    Setup
				</div>
			</a>
			<a href="{{ url('/dashboard/staff') }}">
				<div class="item">
				<span class="fa fa-user-o"></span>
				    Staff Management
				</div>
			</a>
			<a href="{{ url('/dashboard/newsletter') }}">
				<div class="item">
				<span class="fa fa-newspaper-o"></span>
				    Newsletter Management
				</div>
			</a>
			@endif
			</div>
			<div class="right johngold-sidenav-right">
				<div class="johngold-profile">
					<img class="img-responsive" src="{{ url('img/gallery/',$img) }}"/>
					<div class="johngold-profile-pic">
						<!--<img src="{{ url('img/gallery/',$img) }}" class="img-circle">-->
					</div>
					<div class="johngold-profile-info">
						<h5><span class="ol_stat"style='background-color: #<?php echo $ol_stat_color ?>'></span>
							<?php
								echo $lname;
								echo " " . $fname;
								echo " " . $mname;
								
							?>
						</h5>
					</div>
					
					<!--<a href="{{ url('/logout') }}">
						<div class="item jg-color-blue">
							    Settings
						</div>
					</a>			
					<a href="{{ url('/logout') }}">
						<div class="item jg-color-blue">
							Logout
						</div>
					</a>-->
					<div class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<div class="item jg-color-blue">
								Status: {{\Auth::user()->ol_stat}}
							</div>
						</a>
						<ul class="dropdown-menu">
						    <li><a href="#" id="stat_change_offline">Offline</a></li>
						    <li><a href="#" id="stat_change_online">Online</a></li>
						  </ul>
					</div>
					<a href="{{ url('/dashboard/settings', \Auth::user()->id) }}">
						<div class="item jg-color-blue">
							Settings
						</div>
					</a>
					@if(\Auth::check())
						<a href="{{ url('/logout') }}">
							<div class="item jg-color-blue">
								Logout
							</div>
						</a>
					@endif
					
				</div>
			</div>

			