<?php session_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBConnectionUtil.php'?>
<?php
  if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['id']) && isset($_SESSION['active']) & isset($_SESSION['fullname'])){
	    unset($_SESSION['username']);
	    unset($_SESSION['password']);
	    unset($_SESSION['id']);
	    unset($_SESSION['fullname']);
	    unset($_SESSION['active']);
    	header('location:/admin/');
  }
?>