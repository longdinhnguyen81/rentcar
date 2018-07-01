<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php';?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login form shake effect</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="/templates/admin/css/stylelogin.css">
</head>
<body>
  <div class="login-form">
    <?php
      if(isset($_POST['Submit'])){
        $name = $_POST['Name'];
        $username = $_POST['Username'];
        $password = md5($_POST['Password']);
        $queryValid = "SELECT * FROM users";
        $resultValid = $mysqli->query($queryValid);
        while($arValid = mysqli_fetch_assoc($resultValid)){
          $usernameValid = $arValid['username'];
          if($usernameValid == $username){
            echo "Tên đăng nhập đã được sử dụng";
          }
        }
        $query = "INSERT INTO users(username,password,fullname,active)
                  VALUES('{$username}','{$password}','{$name}',2)";
        $result = $mysqli->query($query);
        if($result){
        header('location:/templates/admin/auth/login.php?msg=Create Account Success');
        }else{
          echo "Failed";
          die();
        }
      }
    ?>
     <h1><span style="color:#57A806">Vina</span><span style="color:#FD800F">Enter</span></h1>
     <form method="post">
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Name" name="Name">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username" name="Username">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" name="Password">
       <i class="fa fa-lock"></i>
     </div>
     <button type="Submit" name="Submit" class="log-btn" style="background-color:#57A806">Create Account</button>
   </form>
     
    
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   




</body>

</html>
