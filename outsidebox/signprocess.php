<?php
	require_once "sql/sqlogin.php";
	
	global $firstname;
	global $lastname;
	global $email;
	global $username;
	global $passcode;
	global $confpass;
	global $type;
	
	$firstname = "";
	$lastname = "";
	$email = "";
	$username = "";
	$passcode = "";
	$confpass = "";
	
	if (isset($_POST['firstname']) && 
	isset($_POST['lastname']) && 
	isset($_POST['email']) &&
	isset($_POST['username']) &&
	isset($_POST['passcode']) &&
	isset($_POST['confpass'])
	)
	{
		$firstname = sanitizeString($_POST['firstname']);
		$lastname = sanitizeString($_POST['lastname']);
		$email = sanitizeString($_POST['email']);
		$username = sanitizeString($_POST['username']);
		$passcode = sanitizeString($_POST['passcode']);
		$confpass = sanitizeString($_POST['confpass']);
		$type = sanitizeString($_POST['type']);
		$connection->real_escape_string($firstname);
		$connection->real_escape_string($lastname);
		$connection->real_escape_string($email);
		$connection->real_escape_string($username);
		$connection->real_escape_string($passcode);
		$connection->real_escape_string($confpass);
		$connection->real_escape_string($type);
		
		
		if ($firstname == "" || $lastname == "" || $email == "" || 
		$username == "" || $passcode == "" || $confpass == "")
		{
			setcookie('signuperror', '1', time() + 20);
			$connection -> close();
			header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/signup.php");
			exit();
		}
		
		$usercheckquery = "SELECT username FROM usertable WHERE username = '$username';";
		$userresult = $connection->query($usercheckquery);
		if (!$userresult) die ($connection->error);
		
		$validuser = (($userresult->num_rows) == 0);
		
		if (!$validuser)
		{
			setcookie('signuperror', '2', time() + 20);
			$connection -> close();
			header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/signup.php");
			exit();
		}
		$userresult->close();
		
		
		$emailcheckquery = "SELECT email FROM usertable WHERE email = '$email';";
		$emailresult = $connection->query($emailcheckquery);
		if (!$emailresult) die ($connection->error);
		
		$validemail = (($emailresult->num_rows) == 0);
		
		if (!$validemail)
		{
			setcookie('signuperror', '3', time() + 20);
			$connection -> close();
			header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/signup.php");
			exit();
		}
		$emailresult->close();
		
		if ($passcode != $confpass)
		{
			setcookie('signuperror', '4', time() + 20);
			$connection->close();
			header("http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/signup.php");
			exit();
		}
		
		$typecheck = ($type == 'T' || $type == 'S');
		
		if (!$typecheck)
		{
			echo $type;
			setcookie('signuperror', '5', time() + 20);
			$connection -> close();
			header("Location:http://fineshare-gsathya28679192.codeanyapp.com/FineShare/outsidebox/signup.php");
			exit();
		}
		
		$query = "INSERT INTO usertable (name, lastname, email, username, passcode, type)
			VALUES('$firstname', '$lastname', '$email', '$username', '$passcode', '$type');";
		$result = $connection->query($query);
		if (!$result) die ($connection->error);
		
		$connection->close();
		
		session_start();
		$_SESSION['user'] = $username;
		$_SESSION['email'] = $email;
		
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