<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";

	
	global $title;
	global $notiftext;
	global $notiftype;
	$title = "";
	$notiftext = "";
	$notiftype = "";
	
	$currclasscode = $_COOKIE['currclasscode'];
	
	if (isset($_POST['title']) && isset($_POST['notiftext']))
	{
		$title = $_POST['title'];
		$notiftext = $_POST['notiftext'];
		$notiftype = $_POST['notiftext'];
		$title = sanitizeString($title);
		$notiftext = sanitizeString($notiftext);
		$notiftype = sanitizeString($notiftype);
		$connection->real_escape_string($title);
		$connection->real_escape_string($notiftext);
		$connection->real_escape_string($notiftype);
		
		
		
		if ($title == "" || $notiftext == "")
		{
			setcookie('notiferror', '1', time() + 20);
			$connection->close();
			header("http://localhost:9080/FineShare/insidebox/newnotif.php");
			exit();
		}
		
		
		$query = "INSERT INTO notifdetail(name, type, date, classcode) VALUES('$title', '$notiftype', now(), $currclasscode);";
		$result = $connection->query($query);
		if (!$result) die ($connection->error);
		
		
		$query = "SELECT notifid FROM notifdetail WHERE classcode = $currclasscode ORDER BY date DESC LIMIT 1;";
		$result = $connection->query($query);
		$notifidsql = $result->fetch_array(MYSQLI_ASSOC);
		$notifid = $notifidsql['notifid'];
		$notiflink = 'notif' . $notifid . '.txt';
		
		$result->close();
		
		$fh = fopen("notiftext/$notiflink", 'w');
		fwrite($fh, $notiftext);
		fclose($fh);
		
		
		$query = "UPDATE notifdetail SET detaillink = '$notiflink' WHERE notifid = $notifid ;";
		$result = $connection->query($query);
		if (!$result) die ($connection->error);
		
		
		$connection->close();
		
		setcookie('notifsuccess','1', time() + 15);
		header("Location: http://localhost:9080/FineShare/insidebox/classpage.php");
		
	}
	
	function sanitizeString($string)
	{
		if (get_magic_quotes_gpc()) 
			$string = stripslashes($string);
		
		$string = htmlentities($string);
		return $string;
	}

?>