<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="/templates/admin/img/find_user.png" class="user-image img-responsive" />
            </li>
    <?php
            if(!isset($_GET['hid']) || $_GET['hid'] == 1){
                $active = "class='active-menu'";
            }elseif($_GET['hid'] == 2 || isset($_GET['cid'])){
                $active2 = "class='active-menu'";
            }elseif($_GET['hid'] == 3){
                $active3 = "class='active-menu'";
            }elseif($_GET['hid'] == 4 || isset($_GET['id'])){
                $active4 = "class='active-menu'";
            }elseif($_GET['hid'] == 5 || isset($_GET['xid'])){
                $active5 = "class='active-menu'";
            }else{
                header('location:/admin/index.php');
            }
    ?>
            <li>
                <a <?php if(isset($active)){ echo $active; } ?> href="/admin/index.php?hid=1"><i class="fa fa-dashboard fa-3x"></i> Trang chủ</a>
            </li>
            <li>
                <a <?php if(isset($active2)){ echo $active2; } ?> href="/admin/admin/car/index.php?hid=2"><i class="fa fa-bar-chart-o fa-3x"></i> Quản lý xe</a>
            </li>
            <li>
                <a <?php if(isset($active3)){ echo $active3; } ?> href="/admin/admin/trip/index.php?hid=3"><i class="fa fa-refresh fa-3x"></i> Quản lý chuyến đi</a>
            </li>
            <li>
                <a <?php if(isset($active4)){ echo $active4; } ?> href="/admin/admin/service/index.php?hid=4"><i class="fa fa-sitemap fa-3x"></i> Quản lý dịch vụ</a>
            </li>
            <li>
                <a <?php if(isset($active5)){ echo $active5; } ?> href="/admin/admin/admin/index.php?hid=5"><i class="fa fa-qrcode fa-3x"></i> Quản lý admin</a>
            </li>
        </ul>
    </div>

</nav>
<!-- /. NAV SidE  -->