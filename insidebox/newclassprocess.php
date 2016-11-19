<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";

	global $classname;
	global $classtype;
	global $student; // array of students!
	$classname = "";
	$classtype = "";
	$student = array();

	if (isset($_POST['classname']) && isset($_POST['classtype']))
	{
		$classname = sanitizeString($_POST['classname']);
		$classtype = sanitizeString($_POST['classtype']);
		$connection->real_escape_string($classname);
		$connection->real_escape_string($classtype);

		if ($classname == "" || $classtype == "")
		{
			setcookie('newclasserror', '1', time() + 20);
			$connection->close();
			header("Location: newclass.php");
			exit();
		}

		// Checks if a class with that name exists under his/her account (through username)
		$classcheckquery = "SELECT classname FROM classtable WHERE username = '$username' AND classname = '$classname';";
		$classresult = $connection->query($classcheckquery);
		if (!$classresult) die ($connection->error);

		$validclass = (($classresult->num_rows) == 0);

		if (!$validclass)
		{
			setcookie('newclasserror', '2', time() + 20);
			$connection->close();
			header("Location:newclass.php");
			exit();
		}

		$classresult->close();

		/*
			Personal Notes
			Finish UPDATE query into classtable (and classcodes with next task)
			Finish Student Array Integration
			More stuff I haven't thought of yet
		*/

		$insertclassquery = "INSERT INTO classtable (classname, username, classtype) VALUES ('$classname', '$username', '$classtype');";
		$insertclass = $connection->query($insertclassquery);

		if (!$insertclass)
		{
			setcookie('newclasserror', $connection->error, time() + 20);
			$connection->close();
			header("Location:newclass.php");
			exit();
		}


		$classcodequery = "SELECT classcode FROM classtable WHERE username = '$username' AND classname = '$classname';";
		$getclasscode = $connection->query($classcodequery);
		if (!$getclasscode) die ($connection->error);
		$getclasscodeArr = $getclasscode->fetch_array(MYSQL_ASSOC);
		$classcode = $getclasscodeArr['classcode'];

		$insertclasscodequery = "INSERT INTO classcodes (classcode, username, type, status) VALUES ('$classcode', '$username', 'T', 'ACT')";
		$insertclasscode = $connection->query($insertclasscodequery);
		if (!$insertclasscode)
		{
			setcookie('newclasserror', '4', time() + 20);
			$connection->close();
			header("Location:newclass.php");
			exit();
		}

		$studentnumber = 1;
		$studentrequest = true;

		do
		{
			$studentid = "student$studentnumber";
			if (isset($_POST[$studentid]))
			{
				// Checks if the username actually exists (in usertable)
				$studentemail = $_POST[$studentid];
				$usernamecheckquery = "SELECT username FROM usertable WHERE email = '$studentemail';";
				$usernamecheck = $connection->query($usernamecheckquery);
				if (!$usernamecheck)
				{
					setcookie('newclasserror', '5', time() + 20);
					$connection->close();
					header("Location:newclass.php");
					exit();
				}

				// If it does exist, set a student username variable
				$userARR = $usernamecheck->fetch_array(MYSQL_ASSOC);
				$studentUsername = $userARR['username'];

				// Checks if the student is already in the class (we can't have duplicate students)
				/*
				$classcheckquery = "SELECT * FROM classcodes WHERE username = '$studentUsername' AND classname = '$classname';";
				$classcheck = $connection->query($classcheckquery);


				if (!($classcheck->num_rows == 0))
				{
					setcookie('newclasserror', '6', time() + 20);
					$connection->close();
					header("Location:newclass.php");
					exit();
				}
				*/

				// Provided everything goes smoothly, this will insert the values into the classcodes table
				$insertstudentquery = "INSERT INTO classcodes (classcode, username, type, status) VALUES ('$classcode', '$studentUsername', 'S', 'TREQ');";
				$insertstudent = $connection->query($insertstudentquery);
				if (!$insertstudent)
				{
					setcookie('newclasserror', '7', time() + 20);
					$connection->close();
					header("Location:newclass.php");
					exit();
				}

				$studentnumber += 1;
			}
			else
			{
				$studentrequest = false;
			}
		} while ($studentrequest);

		$connection->close();
		setcookie('success', 'newclass', time() + 20);
		header("Location: index.php");
		exit();

	}
	function sanitizeString($string)
	{
		if (get_magic_quotes_gpc())
			$string = stripslashes($string);

		$string = htmlentities($string);
		return $string;
	}

?>
