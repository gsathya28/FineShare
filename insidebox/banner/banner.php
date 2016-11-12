<?php
	$currclasscode = $_COOKIE['currclasscode'];
	
	require_once "sql/sqlogin.php";
	
	
	
	$query = "SELECT classname FROM classtable WHERE classcode = $currclasscode;";
	$result = $connection->query($query);
	
	if(!$result) die ($connection->error);
	
	$row = $result->fetch_array(MYSQLI_ASSOC);
	

?>


<a href = "classpage.php">
<div id = "banner">
	<h2 id = "bantag"><?php	echo $row['classname']; ?></h2>
	<a href = "index.php">
		<h4 id = "navtag"> Back to Home</h4>
	</a>
</div>
</a>
 
