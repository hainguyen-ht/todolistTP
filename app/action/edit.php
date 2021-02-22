<?php
	require_once '../function.php';
	if(isset($_POST['edit'])){
		$detail = $_POST['detail'];
		$status = $_POST['status'];

		$id = $_GET['id'];
		
		$sql = "UPDATE `listtodo` 
				SET `detail`='$detail',`status`=$status 
				WHERE id=$id";
		
		$result = runQuery($sql);
		if($result){
			echo "<script>
					alert('Cập nhật thành công!');
					location.replace('../../../index.php');
				  </script>";
		}else echo "<script>
					alert('ERROR');
					location.replace('../../index.php');
				  </script>";
	}
?>