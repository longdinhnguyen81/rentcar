<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thông tin chuyến đi</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <?php
                                    if(isset($_GET['msg'])){
                                        echo '<h4>' . $_GET['msg'] . '</h4>';
                                    }
                                ?>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
<?php
    if(isset($_GET['sid'])){
        $sid  = $_GET['sid'];
    }else{
        header('location:/admin/admin/service/index.php');
    }
        $query = "SELECT *,service.id as se_id, service.active as sactive FROM service 
        INNER JOIN users
        ON service.user_id = users.id 
        INNER JOIN car
        ON service.car_id = car.id WHERE service.id = {$sid} 
        ORDER BY service.id DESC LIMIT 5";
        $result = $mysqli->query($query);
        $count  = mysqli_num_rows($result);
        if($count == 0){
            echo "Không có admin cần tìm";
            die();
        }
        $i = 0;
        while($arService = mysqli_fetch_assoc($result)){
            $sid           = $arService['se_id'];
            $cid           = $arService['car_id'];
            $name_car      = $arService['name'];
            $phone         = $arService['phone'];
            $type          = $arService['type'];
            $name_user     = $arService['username'];
            $date_from     = $arService['date_from'];
            $date_to       = $arService['date_to'];
            $datefrom1   = date("d-m-Y", strtotime($date_from));
            $dateto1     = date("d-m-Y", strtotime($date_to));
            $time_from     = $arService['time_from'].'h';
            $time_to       = $arService['time_to'].'h';
            $address_from  = $arService['address_car'];
            $address_to    = $arService['address_to'];
            $sactive       = $arService['sactive'];
            $i++;
            if ($i % 2 == 0) { $cl = "even"; } else { $cl = "odd"; }
        }
?>
                                    <tr>
                                        <th>Tên trường</th>
                                        <td>Nội dung</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>ID</th>
                                        <td><?php echo $sid?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Tên người dùng</th>
                                        <td><?php echo $name_user?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Số điện thoại</th>
                                        <td><?php echo $phone;?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Kiểu đi</th>
                                        <td><?php echo $type;?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Tên xe</th>
                                        <td><?php echo $name_car;?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Thời gian đi</th>
                                        <td><?php echo $time_from?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Ngày đi</th>
                                        <td><?php echo $time_to?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Thời gian trả</th>
                                        <td><?php echo $datefrom1?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Ngày trả</th>
                                        <td><?php echo $dateto1?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Địa điểm đi</th>
                                        <td><?php echo $address_from?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Địa điểm đến nếu có</th>
                                        <td><?php echo $address_to?></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Phản hồi</th>
                                        <td class="center" id="result-<?php echo $sid?>">
                                            <a href="javascript:void(0)" onclick="return getActive(<?php echo $sid?>,<?php echo $cid ?>,<?php echo $sactive?>)">
                                        <?php
                                            if($sactive == 0){
                                        ?>
                                        <img src="/templates/admin/img/deactive.png" />
                                        <?php
                                            }else{
                                        ?>
                                        <img src="/templates/admin/img/active.png" />
                                        <?php
                                            }
                                        ?></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <th>Chức năng</th>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?')" href="/admin/admin/service/del.php?sid=<?php echo $sid; ?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<script>
    function getActive(sid, cid, sactive){
        $.ajax({
            url: 'xulyService.php',
            type: 'POST',
            cache: false,
            data: {
                sId: sid,
                cId: cid,
                aActive: sactive,
            },
            success: function(data){
                $('#result-'+sid).html(data);            
            },
            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>