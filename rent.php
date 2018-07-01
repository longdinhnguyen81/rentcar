<?php ob_start();
session_start();
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php';?>
<?php
if(isset($_GET['cid']) && isset($_GET['pickdate']) && isset($_GET['pickdrop']) && isset($_GET['renttime']) && isset($_GET['rentreturn']) && isset($_GET['adcar']) && isset($_GET['tel'])){
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
	$active       = 0;
	$queryU1      = "INSERT INTO service(car_id,tel,date_from,date_to,time_from,time_to,active,type,address_car)
					VALUES({$cid},{$tel},'{$redate}','{$redrop}',{$renttime},{$rentreturn},{$active},'{$type}','{$adcar}')";
	$resultU1     = $mysqli->query($queryU1);
	if($resultU1){
		$queryC1      = "UPDATE car SET active = 0 WHERE id = {$cid}";
		$resultC1     = $mysqli->query($queryC1);
		header('location:/index.php?msg=Đặt xe thành công');
	}else{
		echo 'Lỗi đặt xe'	;
	}
}elseif(isset($_GET['cid']) && isset($_GET['pickdate']) && isset($_GET['renttime']) && isset($_GET['adcar']) && isset($_GET['adto'])){
	$cid   	   	  = $_GET['cid'];
	$pickdate  	  = $_GET['pickdate'];
	$tel          = $_GET['tel'];
	$redate       = date('Y-d-m',strtotime($pickdate));
	$renttime  	  = $_GET['renttime'];
	$adcar   	  = $_GET['adcar'];
	$adto   	  = $_GET['adto'];
	$type         = "Tìm chuyến đi";
	$active       = 0;
	$queryU2      = "INSERT INTO service (car_id,tel,date_from,time_from,active,type,address_car,address_to)
					 VALUES({$cid},{$tel},'{$redate}',{$renttime},{$active},'{$type}','{$adcar}','{$adto}')";
	$resultU2     = $mysqli->query($queryU2);
	if($resultU2){

		$queryC2      = "UPDATE car SET active = 0 WHERE id = {$cid}";
		$resultC2     = $mysqli->query($queryC2);
		header('location:/index.php?msg=Đặt xe thành công');
	}else{
		echo $cid.$tel.$redate.$renttime.$adcar.$adto;
	}
}

?>
<?php ob_end_flush();?>