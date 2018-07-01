<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>TRANG QUẢN TRỊ VIÊN</h2>
            </div>
        <?php
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                    <?php
                        $icar = 0;
                        $queryc = "SELECT * FROM car";
                        $resultc = $mysqli->query($queryc);
                        while ($arCat = mysqli_fetch_assoc($resultc)) {
                            $icar++;
                        }
                    ?>
                    <div class="text-box">
                        <p class="main-text"><a href="/templates/admin/cat/index.php?hid=2" title="">Quản lý xe</a></p>
                        <p class="text-muted">Có <?php echo $icar ?> xe</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                    <?php
                        $iadmin = 0;
                        $querys = "SELECT * FROM admin";
                        $results = $mysqli->query($querys);
                        while ($arStory = mysqli_fetch_assoc($results)) {
                            $iadmin++;
                        }
                    ?>
                    <div class="text-box">
                        <p class="main-text"><a href="/templates/admin/news/index.php?hid=3" title="">Quản lý admin</a></p>
                        <p class="text-muted">Có <?php echo $iadmin;?> admin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                    <?php
                        $iusers = 0;
                        $queryu = "SELECT * FROM users";
                        $resultu = $mysqli->query($queryu);
                        while ($arUsers = mysqli_fetch_assoc($resultu)) {
                            $iusers++;
                        }
                    ?>
                    <div class="text-box">
                        <p class="main-text"><a href="/templates/admin/users/index.php?hid=4" title="">Quản lý người dùng</a></p>
                        <p class="text-muted">Có <?php echo $iusers;?> người dùng</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>