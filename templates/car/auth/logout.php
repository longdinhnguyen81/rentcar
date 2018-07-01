<?php session_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php'?>
<?php
  if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['fullname'])){
	    unset($_SESSION['username']);
	    unset($_SESSION['fullname']);
	    unset($_SESSION['password']);
    header('location:/');
  }
?>