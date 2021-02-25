<?php
	// $db_host = 'localhost';
	// $db_user = 'root';
	// $db_pass = '';
	// $db_name = 'todo_db';

	$db_host = 'remotemysql.com';
	$db_user = 'FhLHgblj4Y';
	$db_pass = 'z8OFyA56lg';
	$db_name = 'FhLHgblj4Y';

	$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(!$conn){
		die();
	}
?>