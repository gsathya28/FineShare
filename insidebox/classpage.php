<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php	echo "Default"	?></title>
	<link type = "text/css" rel = "stylesheet" href = "css/classpage.css"/>
	<script type = "text/javascript" src = "js/cookiefunc.js">	</script>
</head>

<body style = "background-color: #4c0080">
	
	<?php
		$currclasscode = $_COOKIE['currclasscode'];
		
		require_once "sql/sqlogin.php";
		require_once "sess/sessqueries.php";
		
		$query = "SELECT classname FROM classtable WHERE classcode = $currclasscode;";
		$result = $connection->query($query);
	
		if(!$result) die ($connection->error);
	
		$title = $result->fetch_array(MYSQLI_ASSOC);
	?>
	<!-- Navigation Bar -->
	<?php 
		include_once "nav/nav.php";
	?>
	
	<!-- Main -->
	<div id = "container"> 
	
		<!-- Banner -->
		<div id = "banner"> 
			<h2>
			<?php	
				echo $title['classname'];	
				$result -> close();
			?>
			
			</h2>
			<?php
				if (isset($_COOKIE['notifsuccess']))
			?>
			
			
		</div>
		
		<!-- Calendar -->
		
		<?php 
			include_once "calendar/calendar.php"
		?>
		
		
		
		<!-- Main Container-->
		<div class = "contbox" id = "main">
			<!--Assignments Container-->
			<div class = "mainbox" id = "assignments">
				<!-- Headers and Buttons -->
				<h3 class = "mainh3">Assignments</h3>
				<a href = "assignlist.php"><div class = "all">All Assignments</div></a>
				<a href = "newassign.php"><div class = "new">Create Assignment</div></a>
				
				<br>
				<!-- The Table -->
				<div class = "datatables">
					
					
					<?php
						
						
						$query2 = "SELECT name, detailshort, assignid, duedate FROM assigndetail WHERE classcode = $currclasscode ORDER BY duedate LIMIT 3;"; // ORDER BY date, LIMIT 3!
						$result2 = $connection->query($query2);
						if (!$result2) die ($connection->error);
						
						$rows = $result2 -> num_rows;
						if ($rows == 0)
						{
							echo '<p style = "text-align:center">There are currently no assignments!</p>';
						}
						
						else
						{
							echo '
								<div id = "headrow">
									<div class = "heading" id = "Aname">Assignment</div>
									<div class = "heading" id = "Adetail">Details</div>
									<div class = "heading" id = "Apercent">% Complete</div>
									<div class = "heading" id = "Adate">Due Date</div>
								</div>
							';

							for ($j = 0; $j < $rows; ++$j)
							{
								$row = $result2->fetch_array(MYSQLI_ASSOC);
								$date = strtotime($row['duedate']);
								$date = date("m-d-Y", $date);
								
								echo'
								<a href = "assignment.php">
								<div class = "datarow" onclick = "setassign('. $row['assignid'] .')">
								<div class = "data" id = "Aname">' . $row['name'] . '</div>
								<div class = "data" id = "Adetail">' . $row['detailshort'] . '</div>
								<div class = "data" id = "Apercent">TBD</div>
								<div class = "data" id = "Adate">' . $date . '</div>
								</div>
								</a>';

							}
						}
						$result2->close();
						$connection->close();
						
						
					?>
					<!--
					<a href = "assignment.php">
					<div class = "datarow">
						<div class = "data" id = "Aname">Rotation Wksht.</div>
						<div class = "data" id = "Adetail">Use equations to find the rotational momentum</div>
						<div class = "data" id = "Ahour">5</div>
						<div class = "data" id = "Apercent">75%</div>
						<div class = "data" id = "Adate">08/27/16</div>
					</div>
					</a>
					-->
					
				</div>
			
			</div>
			
			<!--Notification Container-->
			<div class = "mainbox" id = "notifications">
				<h3 class = "mainh3">Notifications</h3>
				<a href = "notiflist.php"><div class = "all">All Notifications</div></a>
				<a href = "newnotif.php"><div class = "new">Create Notification</div></a>
				<br>
				
				<div class = "datatables">
					<div id = "headrow">
						<div class = "heading" id = "Ntype">Type</div>
						<div class = "heading" id = "Nname">Details</div>
						<div class = "heading" id = "Ntime">Time</div>
						<div class = "heading" id = "Ndate">Date Sent</div>
					</div>
					
					<?php
						
					?>
					
					
					<a href = "notification.php">
					<div class = "datarow notifrow">
						<div class = "data" id = "Ntype">Assign</div>
						<div class = "data" id = "Nname">Typo on question #7</div>						
						<div class = "data" id = "Ntime">7:30 PM</div>
						<div class = "data" id = "Ndate">08/12/16</div>
					</div>
					</a>
					
					<a href = "notification.php">
					<div class = "datarow notifrow">
						<div class = "data" id = "Ntype">Dates</div>
						<div class = "data" id = "Nname">Assignment due this Friday</div>						
						<div class = "data" id = "Ntime">8:07 PM</div>
						<div class = "data" id = "Ndate">08/11/16</div>
					</div>
					</a>					
				</div>
			</div>
			
			<!--Material Container-->
			<div class = "mainbox" id = "material">
				<h3 class = "mainh3">Current Unit Tools and Materials</h3>
				<a href = "materialpage.php"><div class = "all">All Unit Materials</div></a>
				<a href = ""><div class = "new">Add Material/Tool</div></a>
				<br>
				
				<div class = "datatables">
					<div id = "headrow">
						<div class = "heading" id = "Ttype">Type</div>
						<div class = "heading" id = "Tname">Name</div>
						<div class = "heading" id = "Tunit">Unit</div>
					</div>
					
					<a href = "">
					<div class = "datarow">
						<div class = "data" id = "Ttype">FlashCards</div>
						<div class = "data" id = "Tname">Polyatomic Ions</div>						
						<div class = "data" id = "Tunit">3</div>
					</div>
					</a>
				</div>
				
				<?php?>
				
			</div>
		</div>
		
		<div class = "contbox statbox" id = "unitbox">
			<h3 style = "padding-top: 20px;">Current Unit</h3>
			<h4>Unit name</h4>
			<h4>Next Unit: <?php echo "Acid/Base Chemistry";?></h4>
			<a href = "units.php"><p id = "unitbutton" style = "padding: 10px;">All Units</p></a>
		</div>
		
		<div class = "contbox statbox" id = "studentbox">
			<a href = "studentlist.php" style = "text-decoration:underline; color: white;"><h3 class = "studenthead" id = "Slist">Class List</h3></a>
			<a href = ""><h4 class = "studenthead" id = "Sadd">Add Student</h4></a>			
			<h4 class = "studenthead" id = "Ccode">Class Code #: <?php	echo "385670"	?></h4>
		</div>
			
		
	</div>

	<!-- Footer -->
	<?php 
		include_once "footer/footer.php"
	?>
	
</body>

</html>