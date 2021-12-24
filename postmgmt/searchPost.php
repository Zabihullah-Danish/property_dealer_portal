<?php
  require '../config/loader.php';

  if(isset($_GET['rd'])){
    echo "<script>alert('Record Added Successfully')</script>";
  }
  if(isset($_GET['warn'])){
    echo "<script>alert('Record Deleted Successfully.')</script>";
  }
  if(isset($_GET['ud']) && $_GET['ud'] == 1){
    echo "<script>alert('Record Update Successfully.')</script>";
  }

?>

<head>
  <title>
    Seach Record |
  </title>
</head>
<?php require '../templates/header1_temp.php';?>
<?php require '../templates/searchPost_temp.php';?>
<?php require '../templates/footer_temp.php'; ?>
