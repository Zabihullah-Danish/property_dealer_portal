<?php
 require_once 'loader.php';
 //require_once '../postmgmt/addNewPost.php';

 if(isset($_POST['submit'])){
   $imgname = $_FILES['img']['name'];
   $pid = $_SESSION['pid'];
   $sql = "INSERT INTO images (`img_name`,`pid`) VALUES ('$imgname','$pid')";
   $query = mysqli_query($con,$sql);

   if(isset($query)){
     move_uploaded_file($_FILES['img']['tmp_name'],"uploads/$imgname");
     echo "<script>alert('record added!')</script>";
     $path = baseUrl('postmgmt/addNewPost.php');
     header("location:".$path);
   }

 }





 ?>
