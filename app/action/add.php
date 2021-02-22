<?php
	require('../function.php');
	
	if(isset($_POST['add'])){
		$detail = $_POST['detail'];
		$status = $_POST['status'];

		$sql = "INSERT INTO `listtodo`(`detail`, `status`) VALUES ('$detail', $status)";
		
		$result = runQuery($sql);
		if($result){
			echo "<script>
					alert('Thêm thành công!');
					location.replace('../../index.php');
				  </script>";
		}else echo "<script>
					alert('ERROR');
					location.replace('../../index.php');
				  </script>";
	}

?>