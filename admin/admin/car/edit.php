<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa xe</h2>
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

                                    if(isset($_GET['cid'])){
                                        $cid  = $_GET['cid'];
                                    }else{
                                        header('location:/templates/admin/car/');
                                    }
                                // In thông tin
                                    $equery   = "SELECT * FROM car WHERE id = {$cid}";
                                    $eresult  = $mysqli->query($equery);
                                    $arEdit   = mysqli_fetch_assoc($eresult);
                                        $ename     = $arEdit['name'];
                                        $emodel    = $arEdit['model'];
                                        $efuel     = $arEdit['fuel'];
                                        $eseat     = $arEdit['seat'];
                                        $emeter    = $arEdit['meter'];
                                        $ehopso    = $arEdit['hopso'];
                                        $emaylanh  = $arEdit['maylanh'];
                                        $epet      = $arEdit['pet'];
                                        $esmoke    = $arEdit['smoke'];
                                        $ehcost    = $arEdit['hourcost'];
                                        $edcost    = $arEdit['datecost'];
                                        $eaddress  = $arEdit['address'];
                                        $egps      = $arEdit['GPS'];
                                        $epicture  = $arEdit['picture'];
                                        $epreview  = $arEdit['preview'];
                                // Khi submit
                                    if(isset($_POST['submit'])){
                                        $name      = $_POST['name'];
                                        $model     = $_POST['model'];
                                        $fuel      = $_POST['fuel'];
                                        $seat      = $_POST['seat'];
                                        $hopso     = $_POST['hopso'];
                                        $maylanh   = $_POST['maylanh'];
                                        $meter     = $_POST['meter'];
                                        $pet       = $_POST['pet'];
                                        $smoke     = $_POST['smoke'];
                                        $hcost     = $_POST['hourcost'];
                                        $dcost     = $_POST['datecost'];
                                        $gps      = $_POST['gps'];
                                        $preview   = $_POST['preview'];
                                        $address   = $_POST['address'];
                                //Kiểm tra có ảnh hay không
                                        if($_FILES['picture']['name'] != ""){
                                            $objFile = new FileUtil();
                                            $tenanh = $objFile->upload('picture', 'templates/car/images');
                                            if(unlink($_SERVER['DOCUMENT_ROOT'].'/templates/car/images/'.$epicture) & $epicture != "") {
                                                echo "Xóa thành công";
                                            } else{
                                                 echo "Chưa xóa ảnh";
                                                die();
                                            }   
                                            $queryedit  = "UPDATE car SET name = '{$name}', model = {$model}, fuel = '{$fuel}', seat = {$seat}, hopso = '{$hopso}', maylanh = {$maylanh}, meter = {$meter}, pet = {$pet}, smoke = {$smoke}, hourcost = {$hcost}, datecost = {$dcost}, preview = '{$preview}',GPS = {$gps}, address = '{$address}', picture = '{$tenanh}' WHERE id = {$cid}";
                                        }else{
                                            $queryedit  = "UPDATE car SET name = '{$name}', model = {$model}, fuel = '{$fuel}', seat = {$seat}, hopso = '{$hopso}', maylanh = '{$maylanh}', meter = {$meter}, pet = {$pet}, smoke = {$smoke}, hourcost = {$hcost}, datecost = {$dcost}, preview = '{$preview}',GPS = {$gps}, address = '{$address}' WHERE id = {$cid}";
                                        }
                                            //Query để insert nội dung vào database
                                            $resultedit = $mysqli->query($queryedit);
                                            if($resultedit){
                                                header('location:/admin/admin/car/index.php?hid=3&msg=Sửa thành công');
                                            }
                                            else{
                                                echo "Có lỗi khi sửa thông tin xe";
                                            }
                                        }
                                    
                                ?>
                                    <div class="form-group">
                                        <label>Tên xe:</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $ename?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Đời xe:</label>
                                        <input type="number" name="model" class="form-control" value="<?php echo $emodel?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nhiên liệu:</label>
                                        <?php
                                            $fuel0 = "";
                                            $fuel1 = "";
                                            if($efuel == 0){
                                                $fuel0 = "selected='selected'";
                                            }else{
                                                $fuel1 = "selected='selected'";
                                            }
                                        ?>
                                            <select name="fuel">
                                                <option <?php echo $fuel0 ?> value="Xăng">Xăng</option>
                                                <option <?php echo $fuel0 ?> value="Dầu diesel">Dầu diesel</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chỗ ngồi:</label>
                                        <input type="number" name="seat" class="form-control" value="<?php echo $eseat?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Công tơ mét(km): </label>
                                        <input type="number" name="meter" width=70px value="<?php echo $emeter?>" />
                                    </div>

                                        <?php
                                            $hopso0 = "";
                                            $hopso1 = "";
                                            if($ehopso == 0){
                                                $hopso0 = "selected='selected'";
                                            }else{
                                                $hopso1 = "selected='selected'";
                                            }
                                        ?>
                                    <div class="form-group">
                                        <label>Hộp số: </label>
                                            <select name="hopso">
                                                <option <?php echo $hopso0?> value="Tự động">Tự động</option>
                                                <option <?php echo $hopso1?> value="Tay côn">Tay côn</option>
                                            </select>
                                    </div>
                                        <?php
                                            $maylanh0 = "";
                                            $maylanh1 = "";
                                            if($emaylanh == 0){
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
                                            $pet0 = "";
                                            $pet1 = "";
                                            if($epet == 0){
                                                $pet0 = "selected='selected'";
                                            }else{
                                                $pet1 = "selected='selected'";
                                            }
                                        ?>
                                    <div class="form-group">
                                        <label>Chở thú cưng:</label>
                                            <select name="pet">
                                                <option <?php echo $pet0 ?> value="0">Không</option>
                                                <option <?php echo $pet1 ?> value="1">Được</option>
                                            </select>
                                    </div>
                                        <?php
                                            $smoke0 = "";
                                            $smoke1 = "";
                                            if($esmoke == 0){
                                                $smoke0 = "selected='selected'";
                                            }else{
                                                $smoke1 = "selected='selected'";
                                            }
                                        ?>
                                    <div class="form-group">
                                        <label>Hút thuốc trong xe:</label>
                                            <select name="smoke">
                                                <option <?php echo $smoke0;?> value="0">Không</option>
                                                <option <?php echo $smoke1;?> value="1">Được</option>
                                            </select>
                                    </div>
                                        <?php
                                            $gps0 = "";
                                            $gps1 = "";
                                            if($egps == 0){
                                                $gps0 = "selected='selected'";
                                            }else{
                                                $gps1 = "selected='selected'";
                                            }
                                        ?>
                                    <div class="form-group">
                                        <label>GPS:</label>
                                            <select name="gps">
                                                <option <?php echo $gps0;?> value="0">Không</option>
                                                <option <?php echo $gps1;?> value="1">Có</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền/ Giờ:</label>
                                        <input type="number" name="hourcost" placeholder="VNĐ" class="form-control" value="<?php echo $ehcost?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền/ Ngày:</label>
                                        <input type="number" name="datecost" placeholder="VNĐ" class="form-control" value="<?php echo $edcost?>" />
                                    </div>
                                    <?php
                                        $qn = '';
                                        $dn = '';
                                        if($eaddress == 'Quảng Ngãi'){
                                            $qn = 'selected="SELECTED"';
                                        }else{
                                            $dn = 'selected="SELECTED"';
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label>Địa điểm hiện tại:</label>
                                        <select name="address">
                                            <option <?php echo $qn;?> value="Quảng Ngãi">Quảng Ngãi</option>
                                            <option <?php echo $dn;?> value="Đà Nẵng">Đà Nẵng</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label>Hình ảnh:</label>
                                        <input type="file" name="picture" />
                                    </div>
                                    <img src="/templates/car/images/<?php echo $epicture?>" width="200px" height="120px" />
                                    <div class="form-group">
                                        <label>Mô tả:</label>
                                        <textarea id="content" class="form-control" rows="3" name="preview"><?php echo $epreview?></textarea>
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
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>