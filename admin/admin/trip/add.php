<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
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
    .ui-draggable, .ui-droppable {
    background-position: top;
}
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm chuyến đi</h2>
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
                                <?php // 
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
                                        $objFile = new FileUtil();
                                        $tenanh = $objFile->upload('picture', 'templates/car/images');
                                            //Query để insert nội dung vào database
                                            $queryadd = "INSERT INTO trip(name,seat,smoke,maylanh,wifi,cost,address_from,detail_from,address_to,detail_to,picture,rentdate,renttime,preview)
                                                         VALUES('{$name}',{$seat},{$smoke},{$maylanh},{$wifi},{$cost},'{$faddress}','{$dfaddress}','{$taddress}','{$dtaddress}','{$tenanh}','{$redate}','{$time}','{$preview}')";
                                            $resultadd = $mysqli->query($queryadd);
                                            if($resultadd){
                                                header('location:/admin/admin/trip/index.php?hid=3&msg=Thêm thành công');
                                            }
                                            else{
                                                echo "Có lỗi khi thêm xe";
                                                unlink($_SERVER['DOCUMENT_ROOT'] . '/templates/car/images/'. $tenanh);
                                            }
                                        }
                                    
                                ?>
                                    <div class="form-group">
                                        <label>Tên xe:</label>
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Chỗ ngồi:</label>
                                        <input type="number" name="seat" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Hút thuốc trong xe:</label>
                                            <select name="smoke">
                                                <option value="0">Không</option>
                                                <option value="1">Được</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Máy lạnh:</label>
                                            <select name="maylanh">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Wifi:</label>
                                            <select name="wifi">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền:</label>
                                        <input type="number" name="cost" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Địa điểm đi:</label>
                                            <select name="address_from">
                                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                <option value="Chu Lai">Chu Lai</option>
                                                <option value="Đà Nẵng">Đà Nẵng</option>
                                                <option value="Quy Nhơn">Quy Nhơn</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết địa điểm đi:</label>
                                        <input type="text" name="detail_from" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Địa điểm đến:</label>
                                            <select name="address_to">
                                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                <option value="Chu Lai">Chu Lai</option>
                                                <option value="Đà Nẵng">Đà Nẵng</option>
                                                <option value="Quy Nhơn">Quy Nhơn</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết địa điểm đến:</label>
                                        <input type="text" name="detail_to" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh:</label>
                                        <input type="file" name="picture" />
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày đi:</label>
                                        <input type="text" name="date" id="datepicker">
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian đi:</label>
                                            <select name="time">
<?php
    for($i=0;$i<=23;$i++){
        $thoigian = $i.':00';
        $thoigian1 = $i.":30";
?>
                                                <option value="<?php echo $thoigian?>"><?php echo $thoigian?></option>
                                                <option value="<?php echo $thoigian1?>"><?php echo $thoigian1?></option>
<?php
    }
?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả:</label>
                                        <textarea id="content" class="form-control" rows="3" name="preview"></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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