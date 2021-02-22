<?php
	require_once 'database.php';

	function runQuery($query){
		global $conn;
		$result = mysqli_query($conn,$query);
		return $result;
	}

	function fetchData($result){
		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] =  $row;
		}
		return $data;
	}

	// function countRecord($result){
	// 	$count = mysqli_num_rows($result);
	// 	$count = ($count < 1) ? false : $count;
	// 	return $count;	
	// }




?>