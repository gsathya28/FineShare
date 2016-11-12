<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/login.css">
</head>

<body style = "background-color: #4c0080">
	

	<?php
		require_once "sess/sessionend.php";
		require_once "sql/sqlogin.php";
	?>
	
	<?php		
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		<br>
		<br>
		<div id = "loginbox">
			
			<?php
				
				if (isset($_COOKIE['loginerror']))
				{
					$error = $_COOKIE['loginerror'];
					switch ($error)
					{
						case 1:
							echo '<br><p style = "text-align: center; color: white; font-family: Raleway;">Please enter all fields!</p>';
							break;
						case 2:
							echo '<br><p style = "color: white; font-family: Raleway; font-size: 14px; text-align: center;">Username-Password Combination incorrect</p>';
							break;
						
					}
				}
			
			?>
		
			<h3 id = "logintitle">Login</h3>
			<div id = "formbox" style = "text-align: center">
			<form action = "loginprocess.php" method = "post">
				<span class = "fields">Username</span><br>
				<input type = "text" name = "user" placeholder = "username (email)"></input><br><br>
				
				<span class = "fields">Password</span><br>
				<input type = "password" name = "passcode" placeholder = "password"></input><br><br>
				
				<input type = "submit" value = "LOG IN!">
			</form>
			</div>
			
			<a href = "help.php" style = "color: white; font-family: Raleway; text-align: center">
			<p>Forgot your password? Click here....</p></a>
			
			
		</div>
	</div>
	
	
	
</body>

</html>