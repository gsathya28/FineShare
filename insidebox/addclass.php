<!DOCTYPE html>
<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
		
	global $classcode;
	global $teacherdetail;
	$classcode = "";
	$teacherdetail = "";

	if (isset($_POST['classcode']) || isset($_POST['teacherdetail']))
	{
		$classcode = sanitizeString($_POST['classcode']);
		$teacherdetail = sanitizeString($_POST['teacherdetail']);
		$connection->real_escape_string($classcode);
		$connection->real_escape_string($teacherdetail);
		
		$teacherdetail = trim($teacherdetail);

		if ($classcode == "" && $teacherdetail == "")
		{
			setcookie('addclasserror', '1', time() + 20);
			$connection->close();
			header("Refresh:0");
			exit();
		}

		$classcodequery = "SELECT * FROM classtable WHERE classcode = '$classcode';";
		$coderesult = $connection->query($classcodequery);

		$codesuccess = !($coderesult->num_rows == 0);
		
		if ($codesuccess)
		{
			$insertquery = "INSERT INTO classcodes (classcode, type, username, status) VALUES ($classcode, 'S', '$username', 'SREQ')";
			$insert = $connection->query($insertquery);
			if (!$insert) die ($connection->error);
			
		}
		else
		{
			
		}

		// I STOPPED HERE!!!!
		$teacheremailquery = "SELECT * FROM classtable WHERE username IN (SELECT username WHERE email = '$teacheremailquery');";
		$teacheremailresult = $connection->query($teacheremailquery);
		
		
		
		
	}

	function sanitizeString($string)
	{
		if (get_magic_quotes_gpc()) 
			$string = stripslashes($string);

		$string = htmlentities($string);
		return $string;
	}
	
?>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/addclass.css">
</head>

<body style = "background-color:#4c0080">
	<?php
		include_once "nav/nav.php";
	?>
	
	<div id = "main">
		<div id = "container">
			<form action = "addclass.php?go" method = "POST">
				<div id = "formbox">
					<br>
					<p class = "fieldtext">Enter Classcode</p>
					<div id = "fieldbox">
						<input name = "classcode" class = "field" />
					</div>
					<p class = "fieldtext"> OR SEARCH USING</p>
					<p class = "fieldtext">Teacher name or email</p>
					<div id = "fieldbox">
						<input name = "teacherdetail" class = "field" />
					</div>
					<br><br>
					<div id = "fieldbox">
						<input type = "submit" value = "Submit!" class = "field" id = "submit"/>
					</div>
				</div>
			</form>
		</div>
		
		<?php
			// PRINT RESULTS OF SEARCH
				
			

			
		?>
		
		
	</div>
	
	<?php
		include_once "footer/footer.php";
	?>
	
</body>

</html>