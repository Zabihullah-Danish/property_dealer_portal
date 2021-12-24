<?php

  require 'loader.php';
  //fetching search button values for searching the required data.
  $pid = $_POST['id'];
  echo $pid;
  $location = $_POST['location'];
  $category = $_POST['category'];
  $deal_type = $_POST['type'];
  $rooms = $_POST['rooms'];
  $garage = $_POST['garage'];
  $sun_side = $_POST['sun_side'];
  $currency = $_POST['currency'];
  //Query to search in database.
  $sql = "SELECT * FROM post WHERE pid = '$pid' OR location = '$location' OR category = '$category' OR
  deal_type = '$deal_type' OR rooms = '$rooms' OR garage = '$garage' OR
  sun_side = '$sun_side' OR currency = '$currency'";
  $search = mysqli_query($con,$sql);



?>
