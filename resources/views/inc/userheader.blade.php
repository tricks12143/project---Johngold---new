<!DOCTYPE html>
{{session()->forget('staffuser')}}
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