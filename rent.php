<?php ob_start();
session_start();
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php';?>
<?php
if(isset($_GET['cid']) && isset($_GET['pickdate']) && isset($_GET['pickdrop']) && isset($_GET['renttime']) && isset($_GET['rentreturn']) && isset($_GET['adcar']) && isset($_GET['tel']) && isset($_GET['name'])){
	$cid   	   	  = $_GET['cid'];
	$pickdate  	  = $_GET['pickdate'];
	$redate       = date("Y-d-m", strtotime($pickdate));
	$pickdrop  	  = $_GET['pickdrop'];
	$redrop  	  = date("Y-d-m", strtotime($pickdrop));
	$renttime  	  = $_GET['renttime'];
	$rentreturn   = $_GET['rentreturn'];
	$adcar   	  = $_GET['adcar'];
	$type         = "Tìm xe";
	$tel          = $_GET['tel'];
	$name         = $_GET['name'];
	$active       = 0;
	$queryU1      = "INSERT INTO service(username,car_id,tel,date_from,date_to,time_from,time_to,active,type,address_car)
					VALUES('{$name}',{$cid},{$tel},'{$redate}','{$redrop}',{$renttime},{$rentreturn},{$active},'{$type}','{$adcar}')";
	$resultU1     = $mysqli->query($queryU1);
	if($resultU1){
		$queryC1      = "UPDATE car SET active = 0 WHERE id = {$cid}";
		$resultC1     = $mysqli->query($queryC1);
		header('location:/index.php?msg=Đặt xe thành công');
	}else{
		echo 'Lỗi đặt xe';
	}
}elseif(isset($_GET['tid']) & isset($_GET['rentdate']) & isset($_GET['renttime']) & isset($_GET['name'])  & isset($_GET['tel']) & isset($_GET['adfrom']) & isset($_GET['adto']) ){
	$tid     = $_GET['tid'];
	$rent_date = $_GET['rentdate'];
	$redate  = date("Y-d-m", strtotime($rent_date));
	$rent_time = $_GET['renttime'];
	$name    = $_GET['name'];
	$tel     = $_GET['tel'];
	$adfrom  = $_GET['adfrom'];
	$adto    = $_GET['adto'];
	$type    = "Tìm chuyến đi";
	$queryU2  = "INSERT INTO service(username,trip_id,tel,date_from,time_from,active,type,address_from,address_to)
		VALUES('{$name}',{$tid},{$tel},'{$redate}',{$rent_time},0,'{$type}','{$adfrom}','{$adto}')";
	$resultU2 = $mysqli->query($queryU2);
	if($resultU2){
		$queryC2  = "UPDATE trip SET active = 0 WHERE id = {$tid}";
		$resultC2 = $mysqli->query($queryC2);
		header('location:/index.php?msg=Đặt xe thành công');
	}else{
		echo 'Lỗi đặt xe';
	}
}
?>
<?php ob_end_flush();?>