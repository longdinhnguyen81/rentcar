
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm admin</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
				<?php
					if(isset($_POST['submit'])){
						$uname = $_POST['uname'];
                        $password = md5($_POST['pass']);
                        $fname = $_POST['fname'];
                        $query = "INSERT INTO admin(adname,adpass,adfullname,active)
                                    VALUES('{$uname}','{$password}','{$fname}',0)";
                        $queryadmin  = "SELECT * FROM admin";
                        $resultadmin = $mysqli->query($queryadmin);
                        while($arAdmin = mysqli_fetch_assoc($resultadmin)){
                            $name = $arAdmin['adname'];
                            if($name == $uname){
                                echo "Đã tồn tại tên đăng nhập: {$name}<br>";
                                echo "<a href='/admin/admin/admin/add.php'>Quay lại</a>";
                                die();
                            }
                        }
                        $result = $mysqli->query($query);
						if($result){
							header("location:/admin/admin/admin/index.php?hid=3&msg=Thêm thành công");
							die();
						}else{
							echo "Có lỗi khi thêm danh mục";
							die();
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
                                        <input type="text" name="uname" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fname" class="form-control" />
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
