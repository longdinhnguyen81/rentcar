<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
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
                                <?php // 
                                    if(isset($_POST['submit'])){
                                        $name      = $_POST['name'];
                                        $model     = $_POST['model'];
                                        $fuel      = $_POST['fuel'];
                                        $seat      = $_POST['seat'];
                                        $hopso     = $_POST['hopso'];
                                        $maylanh   = $_POST['maylanh'];
                                        $meter     = $_POST['meter'];
                                        $pet       = $_POST['pet'];
                                        $gps       = $_POST['gps'];
                                        $smoke     = $_POST['smoke'];
                                        $hcost     = $_POST['hourcost'];
                                        $dcost     = $_POST['datecost'];
                                        $preview   = $_POST['preview'];
                                        $address   = $_POST['address'];
                                //Kiểm tra có ảnh thì upload không thì dừng code 
                                        $objFile = new FileUtil();
                                        $tenanh = $objFile->upload('picture', 'templates/car/images');
                                            //Query để insert nội dung vào database
                                            $queryadd = "INSERT INTO car(name,model,fuel,seat,meter,hopso,maylanh,pet,smoke,hourcost,datecost,picture,preview,GPS,address)
                                                         VALUES('{$name}',{$model},'{$fuel}',{$seat},{$meter},'{$hopso}',{$maylanh},{$pet},{$smoke},{$hcost},{$dcost},'{$tenanh}','{$preview}',{$gps},'{$address}')";
                                            $resultadd = $mysqli->query($queryadd);
                                            if($resultadd){
                                                header('location:/admin/admin/car/index.php?hid=3&msg=Thêm thành công');
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
                                        <label>Đời xe:</label>
                                        <input type="number" name="model" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nhiên liệu:</label>
                                            <select name="fuel">
                                                <option value="Xăng">Xăng</option>
                                                <option value="Dầu diesel">Dầu diesel</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chỗ ngồi:</label>
                                        <input type="number" name="seat" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Công tơ mét(km): </label>
                                        <input type="number" name="meter" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Hộp số: </label>
                                            <select name="hopso">
                                                <option value="Tự động">Tự động</option>
                                                <option value="Tay côn">Tay côn</option>
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
                                        <label>Chở thú cưng:</label>
                                            <select name="pet">
                                                <option value="0">Không</option>
                                                <option value="1">Được</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hút thuốc trong xe:</label>
                                            <select name="smoke">
                                                <option value="0">Không</option>
                                                <option value="1">Được</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>GPS:</label>
                                            <select name="gps">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền/ Giờ:</label>
                                        <input type="number" name="hourcost" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền/ Ngày:</label>
                                        <input type="number" name="datecost" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Địa điểm xe:</label>
                                            <select name="address">
                                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                <option value="Đà Nẵng">Đà Nẵng</option>
                                            </select>
                                    </div>
                                    <div>
                                        <label>Hình ảnh:</label>
                                        <input type="file" name="picture" />
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
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>