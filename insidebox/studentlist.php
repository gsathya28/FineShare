<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/studentlist.css">
</head>

<body style = "background-color: #4c0080">
	<?php
		require_once "sql/login.php";
		$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
		
		if ($connection->connect_error) die ($connection->connect_error);
		
	?>
	
	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		
		<?php
			include_once "banner/banner.php";
		?>
		
		<br><br>
		
		<div id = "main">
			<h2 id = "title">Class Title: Student List</h2>
			
			<a href = ""><div id = "add">Add Student</div></a>
			
			<div id = "stutable">
				<div id = "headrow">
					<div class = "heading" id = "Sname">Name</div>
					<div class = "heading shift" id = "Semail">Email</div>
				</div>
				
				<?php
					$currclasscode = 1;
					
					$query1 = "SELECT * FROM usertable WHERE email IN (SELECT email FROM classcodes WHERE type = 'S' AND classcode = $currclasscode) ORDER BY lastname;";
					$result1 = $connection -> query($query1);
					
					if (!$result1) die ($connection->error);
					
					$rows = $result1 -> num_rows;
					
					for ($j = 0; $j < $rows; ++$j)
					{
						$row = $result1 -> fetch_array(MYSQLI_ASSOC);
						
						echo '
						<div class = "datarow">
						<div class = "data" id = "Sname">' . $row['lastname'] . ", " . $row['name'] . '</div>
						<div class = "data" id = "Semail">' . $row['email'] . '</div>
						</div>
						
						';
						
					}
					
				?>
				
				<div class = "datarow">
					<div class = "data" id = "Sname">Sathyanarayanan</div>
					<div class = "data" id = "Semail">gsathya28@gmail.com</div>
				</div>
				
				<div class = "datarow">
					<div class = "data" id = "Sname">Elaine</div>
					<div class = "data" id = "Semail">elainesweatshirt@yahoo.com</div>
				</div>
				
			</div>			
		</div>
		
	</div>
	
	<?php
		include_once "footer/footer.php";
	?>
	
</body>

</html>