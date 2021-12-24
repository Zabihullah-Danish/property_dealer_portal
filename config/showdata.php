<?php
  //session_start();
  require 'dbconnection.php';

  $uploads = 'postmgmt/uploads/';
  // pagination

  // fetching all post
  $sql = "SELECT * FROM post WHERE category = 'apartment'";
  $query = mysqli_query($con,$sql);
  while($apartment = mysqli_fetch_assoc($query)){
    echo "<pre>";
    print_r($apartment);
  }

?>
