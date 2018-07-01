<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php'; ?>
<?php
	// lấy các biến từ ajax truyền sang
	$cid = $_POST['cId'];
	$sid = $_POST['sId'];
	$active = $_POST['aActive'];
	// tạo biến reActive  => xử lý đổi lại giá trị kích hoặt, nếu = 1 thì đổi lại 0, tương tự 0 -> 1
	$reActive = 1;

	if($active == 1) {
		$query1 = "UPDATE car SET active = 1 WHERE id = {$cid}";
		$query2 = "UPDATE service SET active = 0 WHERE id = {$sid}";
		$reActive = 0;
	}else{
		$query1 = "UPDATE car SET active = 0 WHERE id = {$cid}";
		$query2 = "UPDATE service SET active = 1 WHERE id = {$sid}";
	}
	$result1 = $mysqli->query($query1);
	$result2 = $mysqli->query($query2);
	if($result1 && $result2){
?>
<a href="javascript:void(0)" onclick="return getActive(<?php echo $sid;  ?>,<?php echo $cid?>, <?php echo $reActive?>)" >
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
