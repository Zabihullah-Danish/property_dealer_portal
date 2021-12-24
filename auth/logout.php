<?php
  require '../config/path.php';

  session_start();

  unset($_SESSION['uid']);
  //session_unset();
  //session_destroy();
  header('location: '.baseUrl('postmgmt/postmgmt.php'));

 ?>
