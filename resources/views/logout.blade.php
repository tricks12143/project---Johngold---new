{{session()->flush()}}

<?php
	$link = url('/login');
	header("Location: $link");
	die();
?>