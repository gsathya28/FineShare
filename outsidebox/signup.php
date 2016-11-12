<!DOCTYPE html>
<html>
<head>
	<title>Sign Up! - FineShare</title>
	<link type = "text/css" rel = "stylesheet" href = "css/signup.css">
</head>

<body style = "background-color: #4c0080">
	<?php
		if (isset($_COOKIE['signuperror']))
		{
			echo $_COOKIE['signuperror'];
		}
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		<br>
		<div>Welcome to education's most innovative platform!</div>
		<br>
		<form action = "signprocess.php" method = "post">
			<div id = "signupform">
				<p>Firstname:</p>
				<input type = "text" name = "firstname"/><br>
				<p>Lastname:</p>
				<input type = "text" name = "lastname"/><br>
				<p>E-mail:</p>
				<input type = "text" name = "email"/><br>
				<p>Username:</p>
				<input type = "text" name = "username"/><br>
				<p>Passcode:</p>
				<input type = "password" name = "passcode"/><br>
				<p>Confirm Password:</p>
				<input type = "password" name = "confpass"/><br>
				<p>Account Type</p>
				<select name = "type">
					<option value = "S">Student</option>
					<option value = "T">Teacher</option>
				</select><br><br>
				<input id = "submit" type = "submit" value = "Sign Up!"/>
			</div>
		
		</form>
		
	</div>
	
	
</body>

</html>