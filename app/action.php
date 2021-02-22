<?php
	require_once 'function.php';

	$action = (isset($_GET['action'])) ? $_GET['action'] : null;
	$sForm = 'hide col-xs-4 col-sm-4 col-md-4 col-lg-4';
	$fMain; //status Main
	$fMain = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
	$textForm = 'Thêm Công Việc';
	$textBtn = 'Thêm';
	$vInput = '';
	$vChecked = '';
	$id = (isset($_GET['id'])) ? $_GET['id'] : null;
	switch ($action) {
		case 'add':
			$sForm = 'col-xs-4 col-sm-4 col-md-4 col-lg-4';
			$fMain = 'col-xs-8 col-sm-8 col-md-8 col-lg-8';
			break;
		case 'edit':
			$textForm = 'Sửa Công Việc';
			$textBtn = 'Cập Nhật';
			$sForm = 'col-xs-4 col-sm-4 col-md-4 col-lg-4';
			$fMain = 'col-xs-8 col-sm-8 col-md-8 col-lg-8';
	
			$fetchID = "SELECT * FROM `listtodo` WHERE id = {$id}";
			$dataID = fetchData(runQuery($fetchID));
			$vInput = $dataID[0]['detail'];
			$vChecked = $dataID[0]['status'];
			break;
		case 'cancel':
			$sForm = 'hide col-xs-4 col-sm-4 col-md-4 col-lg-4';
			break;
		case 'delete':
			$dID = "DELETE FROM `listtodo` WHERE id = {$id}";
			$resultDid = runQuery($dID);
			if($resultDid){
				echo "<script>alert('Xoá thành công!');
							location.replace('index.php');
				</script>";
			}else {
				echo "<script>alert('Error!')</script>";
			}
			break;
		default:
			$sForm = 'hide col-xs-4 col-sm-4 col-md-4 col-lg-4';
			break;
	}



?>