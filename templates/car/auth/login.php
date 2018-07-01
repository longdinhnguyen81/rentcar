<?php ob_start();?>
<?php session_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php';?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Flat Login Form 3.0</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="/templates/car/css/styleform.css">

  
</head>

<body>

  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Hoàng Phúc</h1><span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Đăng kí</div>
  </div>
  <div class="form">
    <h2 style="text-align:center;font-size:24px;padding:10px" >Đăng nhập</h2>
    <form action="" method="post">
<?php
  if(isset($_GET['msg'])){
    echo $_GET['msg'];
  }
  if(isset($_POST['lsubmit'])){
    $name = $_POST['name'];
    $pass = md5($_POST['pass']);
    $queryl  = "SELECT * FROM users";
    $resultl = $mysqli->query($queryl);
    while($arUser  = mysqli_fetch_assoc($resultl)){
      $id1         = $arUser['id'];
      $user1       = $arUser['username'];
      $pass1       = $arUser['password'];
      $full1       = $arUser['fullname'];
      if($user1 == $name && $pass1 == $pass){
        $_SESSION['id']       = $id1;
        $_SESSION['username'] = $user1;
        $_SESSION['password'] = $pass1;
        $_SESSION['fullname'] = $full1;
        if(isset($_SESSION['url'])){
          $url = $_SESSION['url'];
          header("location:{$url}");
        }else{
          header('location:/');
        }
      }else{
        echo "Sai tên đăng nhập hoặc mật khẩu";
      }
    }
  }
?>
      <input name="name" type="text" placeholder="Tên đăng nhập"/>
      <input name="pass" type="password" placeholder="Mật khẩu"/>
      <button name="lsubmit">Đăng nhập</button>
    </form>
  </div>
  <div class="form">
    <h2 style="text-align:center;font-size:24px;padding:10px">Tạo tài khoản mới</h2>
    <form action="" method="post">
      <input name="username" type="text" placeholder="Nhập tên đăng nhập"/>
      <input name="password" type="password" placeholder="Nhập mật khẩu"/>
      <input name="email" type="email" placeholder="Nhập email"/>
      <input name="phone" type="tel" placeholder="Nhập số điện thoại"/>
      <button name="rsubmit">Đăng kí</button>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="/templates/car/js/index.js"></script>
</body>

</html>

<?php ob_end_flush() ?>