<?php
	$db_hostname = 'localhost';
	$db_database = 'finedata';
	$db_username = 'sathya';
	$db_password = 'Rhamses2899!';
	
	$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
		
	if ($connection->connect_error) die ($connection->connect_error);
?>