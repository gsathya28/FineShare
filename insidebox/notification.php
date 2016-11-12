<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/notification.css">
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
		<div id = "main">
			<h2 id = "title">Typo on Question #7</h2>
			
			<div id = "time">Date + Time</div>
			
			
			<div id = "notifbox">
				<p id = "notif">There's a typo on Question #7 - It should say H2SO4 not HCO3 - Again... Worksheet due tomorrow!</p>
			</div>
			
		</div>
		
	</div>
	
	<?php
		include_once "footer/footer.php";
	?>
	
</body>

</html>