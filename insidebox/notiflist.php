<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<head>
	<title>Notifications</title>
	<link type = "text/css" rel = "stylesheet" href = "css/notifpage.css" />
</head>

<body style = "background-color: #4c0080">
	<?php
		include_once "nav/nav.php";
	?>

	<div id = "container">
	
		<?php
			include_once "banner/banner.php";
		?>
		
		<div class = "contbox" id = "main">
			<h3 id = "contitles">Notifications</h3>
		</div>
		
		<div class = "contbox" id = "searcher">
			<h3 id = "contitles">Searcher</h3>
		</div>
	
	</div>
	
</body>