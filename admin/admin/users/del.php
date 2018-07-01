<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
	$id = $_GET['id'];
	$query2 = "SELECT * FROM users WHERE id = {$id}";
	$ketqua2 = $mysqli->query($query2);
	$arUser = mysqli_fetch_assoc($ketqua2);
		$account = $arUser['username'];
		if($arUser['username'] == "admin" && $_SESSION['username'] != "admin"){
			header('location:/templates/admin/users/index.php?hid=4&msg=Bạn không có quyền xóa admin');
		}else{
			$query = "DELETE FROM users WHERE id = {$id}";
			$result = $mysqli->query($query);
			if($result){
				header('location:/templates/admin/users/index.php?hid=4msg=Xóa Thành Công');
				die();
			}else{
				echo "Có lỗi khi xóa người dùng";
				die();
			}
		}

?>	
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>