<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calendar - FineShare</title>
	<link type = "text/css" rel = "stylesheet" href = "css/calendarpage.css">
</head>

<body style = "background-color: #4c0080">
	
	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		<div class = "contbox" id = "calendarbox">
			<h1>Calendar</h1>
		</div>
	</div>
	
	<?php
		include_once "footer/footer.php"
	?>
	
</body>


</html>