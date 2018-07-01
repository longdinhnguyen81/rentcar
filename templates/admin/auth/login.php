<?php session_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php';?>
<!DOCTYPE html>
<html lang="vi" >

<head>
  <meta charset="UTF-8">
  <title>Login form</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
      <link rel="stylesheet" href="/templates/admin/css/stylelogin.css">
</head>
<body>
  <div class="login-form">

     <h1><span style="color:orange;font-size:36px"><span style="color:#57A806">Trang quản trị</span> Hoàng Phúc</span></h1>
     <?php
        if(isset($_GET['msg'])){
          echo '<span style="color:orange">' . $_GET['msg'] . '</span>';
        }
        if(isset($_POST['Submit'])){
          if(isset($_SESSION['fail'])){
            unset($_SESSION['fail']);
          }
          $name = $_POST['Username'];
          $pass = md5($_POST['Password']);
          $query = "SELECT * FROM admin";
          $result = $mysqli->query($query);
          while ($arUser = mysqli_fetch_assoc($result)) {
            $username = $arUser['adname'];
            $password = $arUser['adpass'];
            $uid      = $arUser['id'];
            $fname    = $arUser['adfullname'];
            if($name == $username && $pass == $password){ //Đăng nhập đúng
              $_SESSION['id']       = $uid;
              $_SESSION['fullname'] = $fname;
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              header('location:/admin/');
            }else{ //Đăng nhập sai
              $fail = "Login failed 1";
            }
          }
        }if(isset($fail)){
            echo '<span style="color:orange">' . $fail . '</span>';
        }
        if(isset($_SESSION['fail'])){
          echo '<span style="color:orange">' . $_SESSION['fail'] . '</span>';
        }
    ?>
     <form method="post">
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username" name="Username">
       <a href=""><i class="fa fa-user"></i></a>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" name="Password" id="Password">
       <a href="javascript:void(0)" onclick="getPassword()"><i class="fa fa-lock"></i></a>
     </div>
     <button type="Submit" name="Submit" class="log-btn" style="background-color:#57A806">Log in</button>
   </form>
     
    
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
    function getPassword() {
        var x = document.getElementById("Password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>

</html>
