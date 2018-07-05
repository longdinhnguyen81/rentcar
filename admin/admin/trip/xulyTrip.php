<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php'; ?>
<?php
	// lấy các biến từ ajax truyền sang
	$id = $_POST['aId'];
	$active = $_POST['aActive'];
	// tạo biến reActive  => xử lý đổi lại giá trị kích hoặt, nếu = 1 thì đổi lại 0, tương tự 0 -> 1
	$reActive = 1;

	if($active == 1) {
		$query = "UPDATE trip SET active = 0 WHERE id = {$id}";
		$reActive = 0;
	}else{
		$query = "UPDATE trip SET active = 1 WHERE id = {$id}";
	}
	$result = $mysqli->query($query);
	if($result){
?>
<a href="javascript:void(0)" onclick="return getActive(<?php echo $id;  ?>, <?php echo $reActive?>)" >
	<?php
		if($active == 1) {
	?>
		<img src="/templates/admin/img/deactive.png" alt="DeActive" />
	<?php 
		}else{
	?>
		<img src="/templates/admin/img/active.png" alt="Active" />
	<?php
		}
	}
	?>
</a>
