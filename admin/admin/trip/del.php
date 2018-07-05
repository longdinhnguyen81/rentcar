<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
	$cid = $_GET['cid'];
	$pic = $_GET['pic'];
	unlink($_SERVER['DOCUMENT_ROOT']."/templates/car/images/" . $pic);
	
	$query = "DELETE FROM car WHERE id = {$cid}";
	$result = $mysqli->query($query);
	if($result){
		header('location:/admin/admin/car/index.php?hid=2&msg=Xóa Thành Công');
		die();
	}else{
		echo "Có lỗi khi xóa xe";
		die();
	}
?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>