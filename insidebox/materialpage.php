<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Unit Materials - ALL</title>
	<link type = "text/css" rel = "stylesheet" href = "css/materialpage.css">
</head>
<body style = "background-color: #4c0080">
	
	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		
		<?php
			include_once "banner/banner.php";
		?>
		
		<div class = "contbox" id = "units">
			<h3>Units</h3>
			<table id = "unittable">
				<tr>
					<td id = "unitrows">All Materials/Tools</td>
				</tr>
			</table>
			
		</div>
		
		<div class = "contbox" id = "main">
			<div id = "materialbox">
			<h3 id = "contitles">Materials</h3>
			</div>
			
			<div id = "toolbox">
			<h3 id = "contitles">Tools</h3>
			</div> 
		</div>
		
		
		
		
		
		
		
	</div>
	
	<?php
		include_once "footer/footer.php"
	?>
	
</body>
</html>