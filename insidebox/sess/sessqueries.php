<?php
	session_start();
	if (!isset($_SESSION['user']))
	{
		header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/login.php");	
	}
	
	// UserInfo
	$username = $_SESSION['user'];
	$email = $_SESSION['email'];
	$type = $_SESSION['type'];
	
	$userquery = "SELECT name, lastname, type FROM usertable WHERE username = '$username';";
	$userinfo = $connection->query($userquery);
	
	if (!$userinfo) die ($connection->error);
	
	$userarray = $userinfo->fetch_array(MYSQL_ASSOC);
	
	$firstname = $userarray['name'];
	$lastname = $userarray['lastname'];
	$userinfo -> close();
	
	
	

?>