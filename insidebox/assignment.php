<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/assignsheet.css">
</head>

<body style = "background-color: #4c0080">
	<?php
		$currassign = $_COOKIE['assignid'];
		$currclasscode = $_COOKIE['currclasscode'];
		require_once "sql/sqlogin.php";
		
		$query1 = "SELECT name FROM assigndetail WHERE assignid = $currassign";
		$result1 = $connection->query($query1);
		
		if (!$result1) die ($connection->error);
		
		$assignment = $result1->fetch_array(MYSQLI_ASSOC);
		
		
		
	?>
	
	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "container">
		<?php
			include_once "banner/banner.php";
		?>
		
		
		<h2 id = "assigntitle">
		<?php	
			echo $assignment['name'];	
			$result1 -> close();
		?>
		</h2>
		
		<div id = "assigndetail">
			<br>
			<div id = "detailbox">
				<p id = "detail">Details: 
					<?php		
						echo file_get_contents("assgntxt/assign". $currassign . ".txt");
					?>				
				</p>
			</div>
		</div>
		
		<!-- Effects + Google Drive API -->
		
		<!-- Table of Students -->
		
		<div id = "studenttable">
			<div id = "headrow">
				<div class = "heading" id = "Sname">Name</div>
				<div class = "heading" id = "Sstatus">Complete</div>
				<div class = "heading" id = "Stime">On time</div>
			</div>
			
			<?php
				$query2 = "SELECT name, lastname, status, ontime FROM usertable, assign" . $currassign . " WHERE usertable.username = assign" . $currassign . ".username;";
				$result2 = $connection->query($query2);
				
				if (!$result2) die ($connection->error);
				
				$rows = $result2->num_rows;
				
				for ($j = 0; $j < $rows; ++$j)
				{
					$row = $result2->fetch_array(MYSQLI_ASSOC);
					if ($row['ontime'] == NULL)
					{
						$row['ontime'] = '--';
					}
					echo '
					<div class = "datarow">
					<div class = "data" id = "Sname">' . $row['lastname'] . ", " . $row['name'] . '</div>
					<div class = "data" id = "Sstatus">' . $row['status'] . '</div>
					<div class = "data" id = "Stime">' . $row['ontime'] .'</div>
					</div>
					';
				}
				
				$result2 -> close();
				$connection -> close();
				
				
			?>
			
			<div class = "datarow">
				<div class = "data" id = "Sname">Sathyanarayanan, Govindarajan</div>
				<div class = "data" id = "Sstatus">Y</div>
				<div class = "data" id = "Stime">Y</div>
			</div>
			<!--
			<div class = "datarow">
				<div class = "data" id = "Sname">Sukriti</div>
				<div class = "data" id = "Sstatus">Y</div>
				<div class = "data" id = "Stime">N</div>
			</div>
			-->
		</div>
		
	</div>
	
	<?php
		include_once "footer/footer.php"
	?>
	
	
</body>

</html>