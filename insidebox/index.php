<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
?>

<!DOCTYPE html>
<html>

<head>
	<link type = "text/css" rel = "stylesheet" href = "css/indexsheet.css"/>
	<title>
		FineShare
	</title>
</head>

<body style = "background-color: #4c0080">

	<?php
		include_once "nav/nav.php";
		$assignquery = "SELECT * FROM assigndetail
			JOIN classtable ON assigndetail.classcode = classtable.classcode
			WHERE assigndetail.classcode IN (SELECT classcode FROM classcodes WHERE username = '$username');";
		$assignrow = $connection -> query($assignquery);
		if (!$assignrow) die ($connection -> error);
		$assignlist = $assignrow -> fetch_array(MYSQLI_ASSOC);
		$assignrow -> close();
	?>

	<div id = "container">

		<!-- Greeting Banner - Top of others -->
		<div id = "greeting">
			<h2>Welcome
			<?php
				echo $firstname . "!";
			?>
			</h2>
		</div>

		<?php
			include_once "calendar/calendar.php";
		?>

		<div class = "contbox" id = "sheets">
			<?php
				/*
				require_once "event.php";

				// Find which classes student is in
				$classtotalquery = "SELECT classcode FROM classcodes WHERE username = '$username' AND type = '$type' AND status = 'ACT';";
				$classtotalresult = $connection->query($classtotalquery);
				if (!$classtotalresult) die ($connection->error);

				if ($classtotalresult->num_rows == 0)
				{
					echo "You are not active in any classes!";
					if ($type == 'S')
					{
						echo "<p>Do you have the classcode for a class you're in? If so enter it <a href = 'addclass.php'>here</a></p>";
					}
					else if ($type == 'T')
					{
						echo "<p>Create a class to get your feed set up! Get started <a href = 'newclass.php'>here</a>!</p>";
					}
				}
				else
				{
					$assignarray = array();
					$notifarray = array();
					$classtotalevents = array();

					// Goes through each class
					for ($i = 0; $i < $classtotalresult->num_rows; ++$i)
					{
						$SQLclassarray = $classtotalresult->fetch_array(MYSQL_ASSOC);
						$feedclasscode = $SQLclassarray['classcode'];

						// Aggregates Assignments and creates Event instances.
						$assigntotalquery = "SELECT * FROM assigndetail WHERE classcode = $feedclasscode ORDER BY duedate LIMIT 3;";
						$assigntotalresult = $connection->query($assigntotalquery);
						if(!$assigntotalresult) die ($connection->error);

						if ($assigntotalresult->num_rows != 0)
						{
							for ($j = 0; $j < $assigntotalresult->num_rows; $j++)
							{
								$assign = $assigntotalresult->fetch_array(MYSQL_ASSOC);
								$event = new Event($assign['name'], 'A', $assign['assigndate'], $assign['duedate'], $assign['assignid']);
								$assignarray[] = $event;
							}
						}

						// Aggregating Notifications and creating Event instances
						$notiftotalquery = "SELECT * FROM notifdetail WHERE classcode = $feedclasscode ORDER BY date LIMIT 3;";
						$notiftotalresult = $connection->query($notiftotalquery);
						if(!$notiftotalresult) die ($connection->error);

						if ($notiftotalresult->num_rows != 0)
						{
							for ($j = 0; $j < $notiftotalresult->num_rows; $j++)
							{
								$notif = $notiftotalresult->fetch_array(MYSQL_ASSOC);
								$event = new Event($notif['name'], 'N', $notif['date'], time(), $notif['notifid']);
								$notifarray[] = $event;
							}
						}
					}

					// Sort all the assignments in the array - Smaller time first.
					for ($j = 0; $j < count($assignarray) - 1; ++$j)
					{
						$min = $j;
						$minevent = $assignarray[$min];
						for ($k = $j + 1; $k < count($assignarray); ++$k)
						{
							$thingsmallermin = $assignarray[$k]->compareDates($minevent);
							if($thingsmallermin)
							{
								$minevent = $assignarray[$k];
							}
						}
						$temp = $assignarray[$j];
						$assignarray[$j] = $minevent;
						$assignarray[$k] = $temp;
					}

					for ($j = 0; $j < count($assignarray); ++$j)
					{
						$assignarray[$j]->display();
					}


					// Sort all the notifications in the array
					for ($j = 0; $j < count($notifarray); ++$j)
					{

					}

					// Put the assignments and notifications at the end.
					// Merge Sort - - - - -

				}
				*/
			?>
			<h3>Material FeedBox
			</h3>
			<br>
			<h3>Feed Stuff will go here with certain identifiers - ordered by date - height will decrease</h3>
			<!--
			<div id = "classopt" style = "margin-left: 60px;">Class 1</div>
			<div id = "classopt">Class 2</div>
			<div id = "classopt">Class 3</div>


			<a href = "classpage.php" style = "text-decoration: underline"><h4 id = "classtitle">Honors Chemistry</h4></a>
			<br>

			<div id = "quicktable">
				<div id = "headrow">
					<div class = "heading" id = "Qtype">Type</div>
					<div class = "heading" id = "Qname">Name</div>
					<div class = "heading" id = "Qdate">Due Date</div>
				</div>
				<a href = "assignment.php">
				<div class = "datarow">
					<div class = "data" id = "Qtype">Assign</div>
					<div class = "data" id = "Qname">Chem Homework</div>
					<div class = "data" id = "Qdate">08/29/16</div>
				</div>
				</a>
				<a href = "assignment.php">
				<div class = "datarow">
					<div class = "data" id = "Qtype">Quiz</div>
					<div class = "data" id = "Qname">Physics Quiz</div>
					<div class = "data" id = "Qdate">08/31/16</div>
				</div>
				</a>
			</div>
			-->
		</div>


		<div class = "contbox" id = "units">
			<h3>Classes</h3>
			<div class = "classhead">Honors Chemistry</div>
			<br>
			<div class = "classhead">Honors Physics</div>
		</div>

	</div>

	<?php
		include_once "footer/footer.php";
	?>

</body>

</html>
