<?php
  require 'loader.php';

    $pid = $_GET['del'];
    $sql = "UPDATE post SET status = '0' WHERE pid = '$pid'";
    $query = mysqli_query($con,$sql);
    $success = 1;
    header('location:'.baseUrl('postmgmt/searchPost.php?warn='.$success));
    echo "<script>alert('Record Deleted.')</script>"





?>
