<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>

<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <style>
    label{
        margin-left: 20px;
    }
    #datepicker{
        width:180px; 
        margin: 0 20px 20px 20px;
    }
        #datepicker > span:hover{
        cursor: pointer;
    }
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm xe</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                <?php
                                //Hiển thị thông tin xe
                                    if(isset($_GET['tid'])){
                                        $tid = $_GET['tid'];
                                    }else{
                                        header('location:/admin/admin/trip/index.php?hid=3');
                                    }
                                    $queryshow   = "SELECT * FROM trip WHERE id = {$tid}";
                                    $resultshow  = $mysqli->query($queryshow);
                                    $arShow      = mysqli_fetch_assoc($resultshow);
                                        $sname    = $arShow['name'];
                                        $sseat    = $arShow['seat'];
                                        $smaylanh = $arShow['maylanh'];
                                        $ssmoke   = $arShow['smoke'];
                                        $scost    = $arShow['cost'];
                                        $sname    = $arShow['name'];
                                        $sad_from = $arShow['address_from'];
                                        $sde_from = $arShow['detail_from'];
                                        $sad_to   = $arShow['address_to'];
                                        $sde_to   = $arShow['detail_to'];
                                        $swifi    = $arShow['wifi'];
                                        $spicture = $arShow['picture'];
                                        $surl     = '/templates/car/images/' . $spicture;
                                        $sdate    = $arShow['rentdate'];
                                        $redate   = date("d-m-Y", strtotime($sdate));
                                        $stime    = $arShow['renttime'];
                                        $spreview = $arShow['preview'];


                                // Lấy dữ liệu về
                                    if(isset($_POST['submit'])){
                                        $name      = $_POST['name'];
                                        $seat      = $_POST['seat'];
                                        $maylanh   = $_POST['maylanh'];
                                        $smoke     = $_POST['smoke'];
                                        $cost      = $_POST['cost'];
                                        $preview   = $_POST['preview'];
                                        $faddress  = $_POST['address_from'];
                                        $dfaddress = $_POST['detail_from'];
                                        $taddress  = $_POST['address_to'];
                                        $dtaddress = $_POST['detail_to'];
                                        $time      = $_POST['time'];
                                        $date      = $_POST['date'];
                                        $wifi      = $_POST['wifi'];
                                        $redate    = date("Y-m-d", strtotime($date));
                                //Kiểm tra có ảnh thì upload không thì dừng code 
                                        if($_FILES['picture']['name'] != ""){
                                            $objFile = new FileUtil();
                                            $tenanh = $objFile->upload('picture', 'templates/car/images');
                                            if(unlink($_SERVER['DOCUMENT_ROOT'].'/templates/car/images/'.$spicture) & $spicture != "") {
                                                echo "Xóa thành công";
                                            } else{
                                                 echo "Chưa xóa ảnh";
                                                die();
                                            }
                                            $queryedit  = "UPDATE trip SET name = '{$name}', seat = {$seat}, smoke = {$smoke}, maylanh = {$maylanh}, cost = {$cost}, address_from = '{$faddress}', detail_from = '{$dfaddress}', address_to = '{$taddress}', detail_to = '{dtaddress}', wifi = {$wifi}, picture = '{$tenanh}', renttime = '{$time}', rentdate = '{$redate}',preview = '{$preview}' WHERE id = {$tid}";
                                        }else{
                                            $queryedit  = "UPDATE trip SET name = '{$name}', seat = {$seat}, smoke = {$smoke}, maylanh = {$maylanh}, cost = {$cost}, address_from = '{$faddress}', detail_from = '{$dfaddress}', address_to = '{$taddress}', detail_to = '{dtaddress}', wifi = {$wifi}, renttime = '{$time}', rentdate = '{$redate}',preview = '{$preview}' WHERE id = {$tid}";
                                        }
                                        $resultedit = $mysqli->query($queryedit);
                                            if($resultedit){
                                                header('location:/admin/admin/trip/index.php?hid=3&msg=Sửa thành công');
                                            }
                                            else{
                                                echo "Có lỗi khi sửa thông tin xe";
                                            }
                                        }
                                ?>
                                    <div class="form-group">
                                        <label>Tên xe:</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $sname?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Chỗ ngồi:</label>
                                        <input type="number" name="seat" class="form-control" value="<?php echo $sseat?>" />
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            $smoke0 = "";
                                            $smoke1 = "";
                                            if($ssmoke == 0){
                                                $smoke0 = "selected='selected'";
                                            }else{
                                                $smoke1 = "selected='selected'";
                                            }
                                        ?>
                                        <label>Hút thuốc trong xe:</label>
                                            <select name="smoke">
                                                <option <?php echo $smoke0;?> value="0">Không</option>
                                                <option <?php echo $smoke1;?> value="1">Được</option>
                                            </select>
                                    </div>
                                        <?php
                                            $maylanh0 = "";
                                            $maylanh1 = "";
                                            if($smaylanh == 0){
                                                $maylanh0 = "selected='selected'";
                                            }else{
                                                $maylanh1 = "selected='selected'";
                                            }
                                        ?>
                                    <div class="form-group">
                                        <label>Máy lạnh:</label>
                                            <select name="maylanh">
                                                <option <?php echo $maylanh0?> value="0">Không</option>
                                                <option <?php echo $maylanh1?> value="1">Có</option>
                                            </select>
                                    </div>
                                        <?php
                                            $wifi0 = "";
                                            $wifi1 = "";
                                            if($swifi == 0){
                                                $wifi0 = "selected='selected'";
                                            }else{
                                                $wifi1 = "selected='selected'";
                                            }
                                        ?>
                                    <div class="form-group">
                                        <label>Wifi:</label>
                                            <select name="wifi">
                                                <option <?php echo $wifi0?> value="0">Không</option>
                                                <option <?php echo $wifi1?> value="1">Có</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền:</label>
                                        <input type="number" name="cost" class="form-control" value="<?php echo $scost?>" />
                                    </div>
                                    <?php
                                        $qn = '';
                                        $dn = '';
                                        $cl ='';
                                        if($sad_from == 'Quảng Ngãi'){
                                            $qn = 'selected="SELECTED"';
                                        }elseif($sad_from == 'Chu Lai'){
                                            $cl = 'selected="SELECTED"';
                                        }else{
                                            $dn = 'selected="SELECTED"';
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label>Địa điểm đi:</label>
                                            <select name="address_from">
                                                <option <?php echo $qn?> value="Quảng Ngãi">Quảng Ngãi</option>
                                                <option <?php echo $cl?> value="Chu Lai">Chu Lai</option>
                                                <option <?php echo $dn?> value="Đà Nẵng">Đà Nẵng</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết địa điểm đi:</label>
                                        <input type="text" name="detail_from" class="form-control" value="<?php echo $sde_from?>" />
                                    </div>
                                    <?php
                                        $qn1 = '';
                                        $dn1 = '';
                                        $cl1 = '';
                                        if($sad_to == 'Quảng Ngãi'){
                                            $qn1 = 'selected="SELECTED"';
                                        }elseif($sad_to == 'Chu Lai'){
                                            $cl1 = 'selected="SELECTED"';
                                        }else{
                                            $dn1 = 'selected="SELECTED"';
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label>Địa điểm đến:</label>
                                            <select name="address_to">
                                                <option <?php echo $qn1?> value="Quảng Ngãi">Quảng Ngãi</option>
                                                <option <?php echo $cl1?> value="Chu Lai">Chu Lai</option>
                                                <option <?php echo $dn1?> value="Đà Nẵng">Đà Nẵng</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết địa điểm đến:</label>
                                        <input type="text" name="detail_to" class="form-control" value="<?php echo $sde_to?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh:</label>
                                        <input type="file" name="picture" />
                                        <img src="<?php echo $surl?>" width=300px height=200px />
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày đi:</label>
                                        <input type="text" name="date" id="datepicker" value="<?php echo $redate?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian đi:</label>
                                            <select name="time">
<?php
    $select1 = '';
    $select2 = '';
    for($i=0;$i<=23;$i++){
        $thoigian = $i.':00';
        $thoigian1 = $i.":30";
        if($stime == $thoigian){
            $select1 = 'selected = "SELECTED"';
        }else{
            $select1 = '';
        }
        if($stime == $thoigian1){
            $select2 = 'selected = "SELECTED"';
        }else{
            $select2 = '';
        }
?>
                                                <option <?php echo $select1?> value="<?php echo $thoigian?>"><?php echo $thoigian?></option>
                                                <option <?php echo $select2?> value="<?php echo $thoigian1?>"><?php echo $thoigian1?></option>
<?php
    }
?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả:</label>
                                        <textarea id="content" class="form-control" rows="3" name="preview"><?php echo $spreview?></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<script>

  $( function() {

    $( "#datepicker" ).datepicker({
        minDate: 0
        });

  } );

  </script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>