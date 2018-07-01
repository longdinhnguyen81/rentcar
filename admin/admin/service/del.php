<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
	$sid = $_GET['sid'];
	
	$query = "DELETE FROM service WHERE id = {$sid}";
	$result = $mysqli->query($query);
	if($result){
		header('location:/admin/admin/service/index.php?hid=5&msg=Xóa Thành Công');
		die();
	}else{
		echo "Có lỗi khi xóa chuyến đi";
		die();
	}
?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>