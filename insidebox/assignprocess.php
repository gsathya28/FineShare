<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";

	global $assigntitle;
	global $duedate;
	global $assigntext;
	global $detailshort;

	$assigntitle = "";
	$duedate = "";
	$assigntext = "";
	$detailshort = "";

	$currclasscode = $_COOKIE['currclasscode'];

	if (isset($_POST['assigntitle']) &&
		isset($_POST['duedate']) &&
		isset($_POST['assigndetail']))
	{
		$duedate = $_POST['duedate'];
		$assigntitle = sanitizeString($_POST['assigntitle']);
		$assigntext = sanitizeString($_POST['assigndetail']);
		$detailshort = sanitizeString($_POST['detailshort']);
		$connection->real_escape_string($assigntitle);
		$connection->real_escape_string($assigntext);
		$connection->real_escape_string($detailshort);

		if ($assigntitle == "" || $duedate == "" || $assigntext == "")
		{
			setcookie('assignerror', '1', time() + 20);
			$connection->close();
			header("Location:newassign.php");
			exit();
		}
		if ($detailshort == "" || !isset($_POST['detailshort']))
		{
			$detailshort = "None";
		}

		$query = "INSERT INTO assigndetail(name, classcode, duedate, assigndate, detailshort) VALUES ('$assigntitle', '$currclasscode', '$duedate', now(), '$detailshort');";
		$result = $connection->query($query);

		if (!$result) die ($connection->error);

		$query = "SELECT assignid FROM assigndetail WHERE classcode = $currclasscode ORDER BY assigndate DESC LIMIT 1;";
		$result = $connection->query($query);

		if (!$result) die ($connection->error);

		$assignidsql = $result->fetch_array(MYSQLI_ASSOC);
		$assignid = $assignidsql['assignid'];
		$assignlink = 'assign' . $assignid . '.txt';

		$result->close();

		$fh = fopen("assgntxt/$assignlink", 'w');
		fwrite($fh, $assigntext);
		fclose($fh);

		$query = "UPDATE assigndetail SET detaillink = '$assignlink' WHERE assignid = $assignid";
		$result = $connection->query($query);
		if (!$result) die ($connection->error);

		$query = "CREATE TABLE assign" . $assignid . "
			(username VARCHAR(128), status CHAR(4) DEFAULT 'N', ontime CHAR(4), datein datetime, PRIMARY KEY (username))
			ENGINE MyISAM";
		$result = $connection->query($query);
		if (!$result) die ($connection->error);

		$query = "INSERT INTO assign$assignid (username) SELECT username FROM classcodes WHERE classcode = $currclasscode AND type = 'S';";
		$result = $connection->query($query);

		if (!$result) die ($connection->error);


		$connection->close();

		setcookie('assignsuccess', '1', time() + 15);
		header("Location: classpage.php");

	}
	else
	{
		header("Location: newassign.php");
	}
	

	function sanitizeString($string)
	{
		if (get_magic_quotes_gpc())
			$string = stripslashes($string);

		$string = htmlentities($string);
		return $string;
	}
?>
