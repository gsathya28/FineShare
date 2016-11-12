<?php
		
	session_start();
	$_SESSION = array();
	setcookie(session_name(), '', time() - 2589000, '/');
	session_destroy();
	
	header("Location: http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/login.php");
	
?>