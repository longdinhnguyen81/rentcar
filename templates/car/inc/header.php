<?php
  ob_start();
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'] . '/util/getDateTime.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/util/ConstantUtil.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/util/utf8ToLatinUtil.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php';
?>
<!DOCTYPE html>
<html lang="en" class="wide wow-animation">
<head>
  <!-- Site Title-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Xe Hơi Hoàng Phúc</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="/templates/car/images/favicon.png" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" href="/templates/car/css/style.css">
  <script src="/templates/car/js/jquery-2.1.1.min.js"></script>
  <!--[if lt IE 10] -->
</head>

<body>
  <!--= Page-->
  <div class="page text-center">
    <!-- Page Header-->
    <header class="page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed"
          data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-sm-stick-up-offset="50px" data-md-stick-up-offset="90px"
          data-lg-stick-up-offset="90px" class="rd-navbar">
          <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle">
                <span></span>
              </button>
              <div class="rd-navbar-panel-inner">
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand">
                  <a href="/" class="brand-name">
                    <img src="/templates/car/images/logo2.png" width="274" height="66px" alt="" class="img-responsive veil reveal-lg-inline-block">
                    <p></p>
                  </a>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="active">
                      <a href="/">Trang Chủ</a>
                    </li>
                    <li>
                      <a href="">Giới Thiệu</a>
                    </li>
                    <li>
                      <a href="">Câu hỏi thường gặp</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-navbar-dropdown">
                        <li>
                          <a href="#">Tại sao nên đặt xe tại Hoàng Phúc Car?</a>
                        </li>
                        <li>
                          <a href="#">Giờ hoạt động của văn phòng?</a>
                        </li>
                        <li>
                          <a href="#">Những dịch vụ công ty đang hoạt động là gì?</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="">Liên Hệ</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Page Content-->
    <main class="page-content">
      <!-- Intro-->
      <section style="background: #292b31 url(/templates/car/images/background-01-2050x1200.jpg) center/cover no-repeat;" class="section-relative section-intro section-both-sides-insets section-intro-lg-height-800 context-dark">
        <!-- Box-->
        <div style="background: url(/templates/car/images/audi.jpg) center/cover no-repeat;"
          class="box section-intro-inner-bottom shadow-drop-xl section-height-800 section-60 section-sm-90 section-lg-230 inset-lg-left-30 inset-lg-right-30">
          <div class="shell text-left">
            <div class="range range-xs-center range-sm-left">
              <div class="cell-sm-10">
                <h1 class="h1">Hoàng Phúc
                  <br class="veil reveal-lg-inline-block">Car</h1>
                <p class="text-big-25 offset-md-top-50 inset-lg-right-30 thep">Cho thuê hợp đồng tự lái, cho thuê xe 4-7-16 và trên 25 chỗ.
                  <br> Hợp đồng tham quan du lịch Cưới Hỏi.
                  <br> Đưa đón khách tuyến Quảng Ngãi - Sân bay Chu Lai - Đà Nẵng và ngược lại.
                  <br> Đưa đón khách đi khám bệnh tuyền Đà Nẵng Quảng Nam.

                </p>
                <style>
                  .h1 {
                    text-shadow: 3px 3px black;

                  }

                  .thep {
                    text-shadow: 1px 1px black;
                  }
                  .pagin{
                    margin-top:50px;
                  }
                </style>
              </div>
            </div>
          </div>
        </div>
      </section>