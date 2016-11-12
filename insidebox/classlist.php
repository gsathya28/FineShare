<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
	
?>
<!DOCTYPE html>
<html>

<head>
	<title>Classes - FineShare</title>
	<link type = "text/css" rel = "stylesheet" href = "css/classlist.css"/>
	<script type = "text/javascript" src = "js/cookiefunc.js"></script>
</head>
	
<body style = "background-color: #4c0080">
		
	
	<!-- NavBar -->	
	<?php
		include_once "nav/nav.php";
	?>
		
	<div id = "container">
	
		<?php
			include_once "calendar/calendar.php"; 
		?>
		
		
		<!--CALENDAR CLASS: contbox -->
		
		<div class = "contbox" id = "classcont"> <!-- Outside Purple -->
			
			<h3>Classes</h3> 
			
			<div id = "sheets"> <!--Inside Purple -->
				
				<?php
					 // This will change!
					$query = "SELECT classname, name, lastname, email, classcode FROM classtable, usertable 
						WHERE classcode IN (SELECT classcode FROM classcodes WHERE username = '$username' AND status = 'ACT') 
						AND classtable.username = usertable.username;";
					$result = $connection->query($query);
					if(!$result) die($connection->error); 
					
					$rows = $result->num_rows;
					
					if ($rows == 0) // No classes are active
					{
						if ($type == 'S')
						{
							echo <<<_END
							<br>
							<p id = "zeronotice">You aren't enrolled in any classes right now!</p>
_END;
						}
						if ($type == 'T')
						{
							echo <<<_END
							<br>
							<p id = "zeronotice">You haven't created any classes yet!<p><br>							
_END;
						}
						
						$result->close();
						$connection->close();
					}
					else // Classes are created and active
					{
						echo '
						<div id = "headers"> 
							<div class = "heading" style = "width:210px; padding-left: 15px;">Name</div>
							<div class = "heading" style = "width:340px">Teacher</div>
							<div class = "heading" style = "width:235px; text-align: right;">Email</div>
						</div>						
						';
						
						for($j = 0; $j < $rows; ++$j)
						{
							$row = $result->fetch_array(MYSQLI_ASSOC);
							echo '<a href = "classpage.php"><div id = data onclick = "setclasscode(' . $row['classcode'] . ')">';						
							echo '<div id = "name" class = "classbutton">' . $row['classname'] . '</div>';
							echo '<div id = "status" class = "classbutton">' . $row['name'] . " " . $row['lastname'] . '</div>';
							echo '<div id = "percent" class = "classbutton">' . $row['email'] . '</div>';						
							echo '</div></a></form>';
						}
						
						$result -> close();
						$connection -> close();
					}
				?>
				<br>
				<?php
					if ($type == 'S')
					{
						echo '<a href = "addclass.php"><div class = "zeroclassadd" >Add class</div></a>';
					}
					if ($type == 'T')
					{
						echo '<a href = "newclass.php"><div class = "zeroclassadd" >Create class</div></a>';
					}
				?>
				
				
				<!-- Model HTML created by PHP script
				<a href = "classpage.php">
				<div id = "data"> 
					<div id = "name" class = "classbutton">Honors Chemistry</div>
					<div id = "status" class = "classbutton">John Doe</div>
					<div id = "percent" class = "classbutton">500%</div>
				</div>
				</a>
				-->
			</div>
			
		</div>
		
	</div>
		
	<!-- Footer -->	
	<?php
		include_once "footer/footer.php";
	?>
		
</body>

</html>
