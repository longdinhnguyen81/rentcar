<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
	$aid = $_GET['aid'];
	$query = 'SELECT * FROM admin';
	$result = $mysqli->query($query);
	while ($arAmin = mysqli_fetch_assoc($result)) {
		$name = $arAmin['adname'];
		if($name == 'admin'){
			header('location:/admin/admin/admin/index.php?hid=3&msg=Admin chính không thể bị xóa');
		}else{
			$aquery = "DELETE FROM admin WHERE id = {$aid}";
			$aresult = $mysqli->query($aquery);
			if($aresult){
				header('location:/admin/admin/admin/index.php?hid=3&msg=Xóa Thành Công');
				die();
			}else{
				echo "Có lỗi khi xóa người dùng";
				die();
			}
		}
	}
?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>