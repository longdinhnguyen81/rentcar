<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
				<?php
					if(isset($_POST['submit'])){
						$username = $_POST['username'];	
						$password = md5($_POST['password']);
						$fname = $_POST['fullname'];
                        if($username == "" || $password == "" || $fname = ""){
                            echo "Bạn chưa nhập đầy đủ thông tin";
                            die();
                        }else{
                            $queryCheck  = "SELECT * FROM users";
                            $resultCheck = $mysqli->query($queryCheck);
                            while($arCheck = mysqli_fetch_assoc($resultCheck)){
                                $cUsername = $arCheck['username'];
                                if($username == $cUsername){
                                    echo "Username đã được sử dụng";
                                    die();
                                }
                            }
            						$query = "INSERT INTO users(username,password, fullname)
            						VALUES('{$username}','{$password}','{$fname}')";
            						$ketqua = $mysqli->query($query);
            						if($ketqua){
            							header("location:/admin/admin/users/index.php?hid=4&msg=Thêm thành công");
            							die();
            						}else{
            							echo "Có lỗi khi thêm người dùng";
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
                                        <input type="text" name="username" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" />
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success btn-md" target="_blank" href="mailto:<?php echo $mail?>">Thêm</button>
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