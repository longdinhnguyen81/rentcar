<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <?php
                    $aid = $_GET['aid'];
                    // Phân Quyền Admin
                    $query2 = "SELECT * FROM admin WHERE id = {$aid}";
                    $ketqua2 = $mysqli->query($query2);
                    $arUser = mysqli_fetch_assoc($ketqua2);
                    if($arUser['adname'] == "admin" && $_SESSION['username'] != "admin"){
                        header('location:/admin/admin/admin/index.php?msg=Bạn không có quyền sửa admin');
                    }
                    if(isset($_POST['submit'])){
                        $username = $_POST['username']; 
                        $password = $_POST['password'];
                        $fullname = $_POST['fullname'];
                        $queryValid  = "SELECT * FROM admin WHERE id != {$aid}";
                        $resultValid = $mysqli->query($queryValid);
                        while($arValid = mysqli_fetch_assoc($resultValid)){
                            $uname = $arValid['adname'];
                            if($username == $uname){
                                echo "Tên đăng nhập đã tồn tại";
                                die();
                            }
                        }
                        if($password == ""){
                            $query = "UPDATE admin
                                    SET adfullname = '{$fullname}'
                                    WHERE id = {$aid}";
                            $ketqua = $mysqli->query($query);
                            if($ketqua){
                                header("location:/admin/admin/admin/index.php?msg=Sửa thành công?hid=3");
                                die();
                            }else{
                                echo "Có lỗi khi sửa người dùng 1";
                                die();
                            }
                        }else{
                            $password = md5($password);
                            $query3 = "UPDATE admin
                                    SET adfullname = '{$fullname}',
                                        adpass = '{$password}'
                                    WHERE id = {$aid}";
                            $ketqua3 = $mysqli->query($query3);
                            if($ketqua3){
                                header("location:/admin/admin/admin/index.php?hid=3&msg=Sửa thành công");
                                die();
                            }else{
                                echo "Có lỗi khi sửa người dùng 2";
                                die();
                            }
                        }
                    }
                ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $arUser['adname']?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" value="<?php echo $arUser['adfullname']?>"  />
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