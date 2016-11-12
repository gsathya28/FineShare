<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/newnotif.css">
</head>

<body style= "background-color: #4c0080">
	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		
		<?php
			include_once "banner/banner.php";
		?>
		<br>
		
		<form action = "notifprocess.php" method = "post">
		<div id = "main">
			
			<div id = "titlebox">
				<input id = "title" name = "title" placeholder = "Enter notification title"></input>
			</div>
			
			<br>
			
			<div id = "test">
				<input class = "notiftype" type = "radio" name = "notiftype" value = "assignment"/>Assign
				<input class = "notiftype" type = "radio" name = "notiftype" value = "dates"/>Dates
				<input class = "notiftype" type = "radio" name = "notiftype" value = "assessment"/>Assess
				<input class = "notiftype" type = "radio" name = "notiftype" value = "class" checked = "checked"/>Class (Default)
				<hr>		
				<textarea id = "notif" name = "notiftext" placeholder = "Details Here!"></textarea>
			</div>
			<div id = "savebox">
				<input id = "save" type = "submit" value = "Save"></input>
			</div>
		</div>
		</form>
		
	</div>
	
	<?php
		include_once "footer/footer.php";
	?>
	
</body>

</html>