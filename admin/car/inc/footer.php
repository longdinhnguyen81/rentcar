<footer id="footer">
      <div class="footer_top">
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Theo dõi bằng email</h2>
            <div class="subscribe_area">
<?php
  if(isset($_POST['submittop'])){
    $emailtop  = $_POST['emailtop'];
    if($emailtop == ""){
      echo "Bạn chưa nhập email";
      die();
    }else{
      $querytop  = "INSERT INTO contact(email,is_slide)
                    VALUES('{$emailtop}',0)";
      $resulttop = $mysqli->query($querytop);
      if($resulttop){
        echo "<span style='color:white'>Gửi thành công</span>";
      }else{
        echo "<span style='color:white'>Gửi thất bại</span>";
      }
    }
  }
?>
              <form action="" method="post">
                <div class="subscribe_mail">
                  <input class="form-control" type="email" name="emailtop" placeholder="Email Address">
                  <i class="fa fa-envelope"></i></div>
                <input class="submit_btn" type="submit" name="submittop" value="Submit">
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Bài đăng mới</h2>
            <ul class="catg3_snav ppost_nav">
<?php
  $queryfoo      = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
  $resultfoo     = $mysqli->query($queryfoo);
  while($arfoo   = mysqli_fetch_assoc($resultfoo)){
    $namefoo     = $arfoo['name'];
    $foid        = $arfoo['id'];
    $fpic        = $arfoo['picture'];
    $urlfoo      = '/templates/shareit/images/'. $fpic;
?>
              <li>
                <div class="media"> <a class="media-left" href="detail.php?sid=<?php echo $foid?>"> <img src="<?php echo $urlfoo?>" alt=""> </a>
                  <div class="media-body"> <a class="catg_title" href="detail.php?sid=<?php echo $foid?>"><?php echo $namefoo?></a></div>
                </div>
             </li>
<?php
  }
?>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInRight">
            <h2>Nhãn</h2>
            <ul class="footer_labels">
              <li><a href="cat.php?label=dev day">Devday</a></li>
              <li><a href="cat.php?label=java">Java</a></li>
              <li><a href="cat.php?label=php">PHP</a></li>
              <li><a href="cat.php?label=Công Nghệ">Công nghệ</a></li>
              <li><a href="cat.php?label=iphone">Iphone</a></li>
              <li><a href="cat.php?label=microsoft">Microsoft</a></li>
              <li><a href="cat.php?label=marketing">Marketing</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInRight">
            <h2>Liên hệ</h2>
<?php
  if(isset($_POST['submit'])){
    $nameCT    = $_POST['name'];
    $emailCT   = $_POST['email'];
    $message   = $_POST['message'];
    if($nameCT == "" || $emailCT == "" || $message == ""){
      echo "Bạn chưa nhập đầy đủ thông tin";
      die();
    }else{
      $queryadd   = "INSERT INTO contact(name,email,message,is_slide)
                     VALUES('{$nameCT}','{$emailCT}','{$message}',1)";
      $resultadd  = $mysqli->query($queryadd);
      if($resultadd){
        echo "<span style='color:white'>Gửi thành công</span>";
      }else{
        echo "<span style='color:white'>Gửi thất bại</span>";
      }
    }
  }
?>
            <form action="#" method="POST" class="contact_form">
              <label>Name</label>
              <input class="form-control" name="name" type="text">
              <label>Email*</label>
              <input class="form-control" name="email" type="email">
              <label>Message*</label>
              <textarea class="form-control" name ="message" cols="30" rows="10"></textarea>
              <input class="send_btn" type="submit" name="submit" value="Send">
            </form>
          </div>
        </div>
      </div>
      <div class="footer_bottom">
        <div class="footer_bottom_left">
          <p>Coder by IATME</p>
        </div>
        <div class="footer_bottom_right">
          <ul>
            <li style="color:white">Follow me:</li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Facebook" href="https://www.facebook.com/taiem.bkdn"><i class="fa fa-facebook"></i></a></li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Googel+" href="https://plus.google.com/116024603462039204203"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Youtube" href="https://www.youtube.com/channel/UCfsT1aoGDivc_B-ablVNP8A?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<script src="/templates/shareit/assets/js/jquery.min.js"></script>
<script src="/templates/shareit/assets/js/wow.min.js"></script>
<script src="/templates/shareit/assets/js/bootstrap.min.js"></script>
<script src="/templates/shareit/assets/js/slick.min.js"></script>
<script src="/templates/shareit/assets/js/jquery.li-scroller.1.0.js"></script>
<script src="/templates/shareit/assets/js/custom.js"></script>
</body>
</html>