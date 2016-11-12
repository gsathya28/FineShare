<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>

<head>
	<link type = "text/css" rel = "stylesheet" href = "css/newassign.css">
</head>

<body style = "background-color: #4c0080">

	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		
		<?php
			include_once "banner/banner.php";
		?>
		
		<form action = "assignprocess.php" method = "post"> 
					
			<div id = "assigntitle">
				<input id = "titleform" type = "text" name = "assigntitle" placeholder = "Enter Assignment Title Here!"/>
			</div>
			
			<div id = "assigndetail">
				<br>
				<div id = "detailbox">
					<p style = "padding-top: 10px;">Enter Details:</p>
					<div id = "detail">
						<textarea id = "detailform" type = "text" name = "assigndetail" placeholder = "Right Here!"></textarea>
					</div>
				</div>
			</div>
			
			<div id = "assigninfo">
				
				<p>Short Detail (Optional - MAX 100 characters):</p>
				<div id = "short"><input class = "infoform" type = "text" name = "detailshort"/></div>
				<p>Enter Due Date: </p>
				<div class = "info"><input class = "infoform" type = "date" name = "duedate"/></div>
				<!--
				<p>Enter Assign date (Optional- only if you want to assign at a later date) : </p>
				<div class = "info"><input class = "infoform" type = "date" name = "assigndate"/></div>
				-->
			</div>
			
			<div id = "submitbox"><input id = "submit" type = "submit" value = "Save Assignment"></div>
			
			
		</form>
		
		
		
	</div>
	
</body>

</html>
