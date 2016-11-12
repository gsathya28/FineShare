<?php
	require_once "sql/sqlogin.php";
	require_once "sess/sessqueries.php";
	if ($type != 'T')
	{
		$connection->close();
		header("Location: http://localhost:9080/FineShare/insidebox/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "css/newclass.css">
	<script type = "text/javascript" src = ""></script><!--JavaScript AddStudents Button-->
</head>

<body style = "background-color: #4c0080">
	<?php
		if (isset($_COOKIE['newclasserror'])) echo '<p style = "color: white" >' . $_COOKIE['newclasserror'] . '</p>';
		include_once "nav/nav.php";
	?>
	
	<div id = "container">

		<div id = "formcontainer">
		<form action = "newclassprocess.php" method = "POST">
			
			<br>
			<p class = "fieldname">Class name</p>
			<div class = "fieldcont" id = "classname">
				<input type = "text" name = "classname" class = "fields"/>
			</div>
			
			<p class = "fieldname" >Class type (subject)</p>
			<div class = "fieldcont" id = "classtype">
				<select name = "classtype" class = "fields">
					<option value = "math">Math</option>
					<option value = "science">Science</option>
					<option value = "history/social studies">History/Social Studies</option>
					<option value = "english_writing">English - Writing</option>
					<option value = "english_analysis">English - Analysis (Literature, Grammar, etc.)</option>
					<option value = "world language">World Language</option>
					<option value = "compsci">Computer Science</option>
					<option value = "elementary">Elementary</option>
					<option value = "other">Other</option>
				</select>
			</div>
			
			<p class = "fieldname">Add Students <br>(Optional - Can be done later)</p>
			<div class = "fieldcont" id = "studentfield">
				<input type = "text" name = "student1" class = "fields" placeholder = "Enter student email here!"/>
			</div>
			<br>
			
			<div id = "studentadd" onclick = ""><!--Button onclick - JavaScript Function - Add student field-->
				Add more students
			</div>
			
			<br>
			<br>
			
			<div id = "submit">
				<input type = "submit" value = "Create class!" class = "fields"/>
			</div>
			
		</form>
		</div>
	</div>
	
	<?php
		include_once "footer/footer.php";
	?>
</body>
</html>
