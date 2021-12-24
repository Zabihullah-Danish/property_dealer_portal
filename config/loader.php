<?php
session_start();
require 'path.php';
require 'dbconnection.php';
  if(!isset($_SESSION['uid'])){
    header('location:'.baseUrl('auth/login.php'));
    exit();
  }



 ?>
