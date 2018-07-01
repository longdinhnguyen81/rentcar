<?php ob_start();?>
<?php session_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/FileUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/ConstantUtil.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | Du lịch Hoàng Phúc</title>
    <!-- JQUERY -->
    <script src="/templates/admin/js/jquery-2.1.1.min.js"></script>
    <!-- CKFINDER -->
    <script src="/templates/admin/js/ckeditor/ckeditor.js"></script>
    <!-- BOOTSTRAP STYLES-->
    <link href="/templates/admin/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/templates/admin/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/templates/admin/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/">Trang quản trị</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Xin chào, <b>
<?php
	if(isset($_SESSION['fullname'])){
        $fname = $_SESSION['fullname'];
        echo $fname;
    }else{
        header('location:templates/admin/auth/login.php');
    }
?>
</b> &nbsp; <a href="/templates/admin/auth/logout.php" class="btn btn-danger square-btn-adjust">Đăng xuất</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <?php
            if(empty($_SESSION['username']) && empty($_SESSION['password'])){
                $_SESSION['fail'] = "Log in here";
                header('location:/templates/admin/auth/login.php');
           }
        ?>