<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php	echo "Honors Chemistry "	?> Assignments</title>
	<link type = "text/css" rel = "stylesheet" href = "css/assignlist.css" />
	<script type = "text/javascript" src = "js/cookiefunc.js"></script>
</head>

<body style = "background-color: #4c0080">
	
	<?php
		include_once "nav/nav.php";
	?>

	<div id = "container">
		
		<?php
			include_once "banner/banner.php"
		?>
				
		<div class = "contbox" id = "units">
			<h3 id = "contitles">Units</h3>
		</div>
		
		<div class = "contbox" id = "assignments">
			<h3 id = "contitles">Assignments</h3>
			
			<div id = "assigntable">
				<div id = "headrow">
					<div class = "heading" id = "Aname">Assignment</div>
					<div class = "heading" id = "Adetail">Details</div>
					<div class = "heading" id = "Apercent">% Complete</div>
					<div class = "heading" id = "Adate">Due Date</div>
				</div>
				
				<?php
					$query2 = "SELECT name, detailshort, assignid FROM assigndetail WHERE classcode = $currclasscode;"; // ORDER BY date, LIMIT 3!
					$result2 = $connection->query($query2);
					if (!$result2) die ($connection->error);
					
					$rows = $result2 -> num_rows;
					
					for ($j = 0; $j < $rows; ++$j)
					{
						$row = $result2->fetch_array(MYSQLI_ASSOC);
					
						echo'
						<a href = "assignment.php">
						<div class = "datarow" onclick = "setassign('. $row['assignid'] .')">
						<div class = "data" id = "Aname">' . $row['name'] . '</div>
						<div class = "data" id = "Adetail">' . $row['detailshort'] . '</div>
						<div class = "data" id = "Apercent">TBD</div>
						<div class = "data" id = "Adate">TBD</div>
						</div>
						</a>';
						
					}
					
					$result2->close();
					$connection->close();
				
				?>
				
				<a href = "assignment.php">
				<div class = "datarow">
					<div class = "data" id = "Aname">Rotation Wksht.</div>
					<div class = "data" id = "Adetail">Use equations to find the rotational momentum</div>
					<div class = "data" id = "Apercent">75%</div>
					<div class = "data" id = "Adate">08/27/16</div>
				</div>
				</a>
				
			</div>
			
		</div>
		
	</div>
	
	<?php
		include_once "footer/footer.php";
	?>
	
</body>


</html>

