<?php session_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Utf8ToLatinUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/ConstantUtil.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Share IT</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/bootstrap.min.css">
<link rel="SHORTCUT ICON" href="/templates/admin/img/icon.png" />
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="/templates/shareit/assets/css/style.css">
<!--[if lt IE 9]>
<script src="/templates/shareit/assets/js/html5shiv.min.js"></script>
<script src="/templates/shareit/assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">
    <header id="header">
      <div class="header_bottom">
        <div class="logo_area"><a class="logo" href="/trang-chu"><b>VNE</b> <span>Share IT Project</span></a></div>
      <div id="topnav">
              <ul>
<?php
  if(empty($_SESSION['fullname']) & empty($_SESSION['password'])){
?>                
                <li><a href="/templates/admin/auth/login.php">Đăng nhập</a>
<?php
  }else{
    $fullname = $_SESSION['fullname'];
?>
                <li>Xin chào <br><a href=""><?php echo $fullname?></a>
                  <ul>
                    <li><a href="/templates/admin/auth/logout.php">Đăng xuất</a></li>
                  </ul>
                </li>
<?php
  }
?>
      <?php
        $query    = "SELECT * FROM cat_list WHERE parent_id = 0";
        $result   = $mysqli->query($query);
        while ($arCatCha = mysqli_fetch_assoc($result)){
          $name = $arCatCha['name'];
          $cid  = $arCatCha['id'];
          $nameceo1  = utf8ToLatin($name);
          $urlceo1   = '/cat/' . $nameceo1 . '-' . $cid;
          $querysma  = "SELECT * FROM cat_list WHERE parent_id = {$cid}";
          $resultsma = $mysqli->query($querysma);
          $count     = mysqli_num_rows($resultsma);
          if($count != 0){
      ?>
                <li><a href="<?php echo $urlceo1?>"><?php echo $name?></a>
                  <ul>
      <?php
        while ($arCat = mysqli_fetch_assoc($resultsma)) {
          $name = $arCat['name'];
          $idc     = $arCat['id'];
          $nameceo2  = utf8ToLatin($name);
          $urlceo2   = '/cat/' . $nameceo2 . '.html';
      ?>
                    <li><a href="<?php echo $urlceo2?>"><?php echo $name?></a></li>
      <?php
        }
      ?>
                  </ul>
                </li>
      <?php
          }else{
        
      ?>
                <li><a href="<?php echo $urlceo1?>"><?php echo $name?></a></li>
      <?php
          }
        }
      ?>
                <li><a href="/trang-chu">Trang chủ</a></li>
            </ul>
          </div>  
      </div>

    </header>
    <div class="latest_newsarea"> <span>Xem nhiều nhất</span>
      <ul id="ticker01" class="news_sticker">
<?php
  $queryMenu  = "SELECT * FROM news WHERE is_slide = 1 ORDER BY counter DESC LIMIT 6";
  $resultMenu = $mysqli->query($queryMenu);
  while ($arMenu = mysqli_fetch_assoc($resultMenu)) {
    $nameMe = $arMenu['name'];
    $idMe   = $arMenu['id'];
?>
        <li><a href="/detail.php?sid=<?php echo $idMe?>"><?php echo $nameMe?></a></li>
<?php
  }
?>      
      </ul>
    </div>
    <div class="thumbnail_slider_area">
      <div class="owl-carousel">
<?php
  $queryBot  = "SELECT * FROM news WHERE is_slide = 1 ORDER BY counter DESC LIMIT 6";
  $resultBot = $mysqli->query($queryBot);
  while ($arBot = mysqli_fetch_assoc($resultBot)) {
    $id   = $arBot['id'];
    $name = $arBot['name'];
    $date = $arBot['date_create'];
    $picture = $arBot['picture'];
    $count   = $arBot['counter'];
    $url     = '/templates/shareit/images/' . $picture;
    $queryCount = "SELECT COUNT(*) as SLcomment FROM news INNER JOIN comment ON news.id = comment.news_id WHERE news.id ={$id}";
    $resultCount = $mysqli->query($queryCount);
    $arCount     = mysqli_fetch_assoc($resultCount);
      $comment   = $arCount['SLcomment'];
?>
        <div class="signle_iteam"> <img width="395px" height="396px" src="<?php echo $url;?>" alt="" >
          <div class="sing_commentbox slider_comntbox">
            <p><i class="fa fa-calendar"></i><?php echo $date?></p>
            <a><i class="fa fa-comments"></i><?php echo $comment . ' bình luận' ?></a>
            <a><i class="fa fa-circle"></i><?php echo $count . ' lượt xem' ?></a>
          </div>
          <a class="slider_tittle" href="/detail.php?sid=<?php echo $id?>"><?php echo $name?></a></div>
<?php
  }
?>
      </div>
    </div>