<?php
	require_once "sql/sqlogin.php";
	
	global $user;
	global $pass;
	$user = "";
	$pass = "";
	
	if (isset($_POST['user']) && isset($_POST['passcode']))
	{
		$user = $_POST['user'];
		$pass = $_POST['passcode'];
		$user = sanitizeString($user);
		$pass = sanitizeString($pass);
		$connection->real_escape_string($user);
		$connection->real_escape_string($pass);
		
		if ($user == "" || $pass == "")
		{
			setcookie('loginerror', '1', time() + 20);
			$connection->close();
			header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/insidebox/index.php");
			exit();
		}
			
			
		$query = "SELECT username, passcode, email, type FROM usertable WHERE username = '" . $user . "' AND passcode = '" . $pass . "';";
		$result = $connection->query($query);
		if (!$result) die ($connection->error);
		
		$rows = $result->num_rows;
		
		if ($rows == 0)
		{
			setcookie('loginerror', '2', time() + 20);
			header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/login.php");
			exit();
		}
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		session_start();
		$_SESSION['user'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['type'] = $row['type'];
		
		$result->close();
		$connection->close();
		
		header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/insidebox/index.php");
			
		exit();
			
	}
		
	function sanitizeString($string)
	{
		if (get_magic_quotes_gpc()) 
			$string = stripslashes($string);
		
		$string = htmlentities($string);
		return $string;
	}
		
?>