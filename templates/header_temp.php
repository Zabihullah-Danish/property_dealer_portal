<?php //require '../config/config.php';
  // require 'config/dbconnection.php';
  $sql3 = "SELECT * FROM post WHERE category = 'apartment'";
  $query = mysqli_query($con,$sql3);
  //$apartment = mysqli_fetch_assoc($query);
  while($apartment = mysqli_fetch_assoc($query)){
    $pid = $apartment['pid'];
  }

?>
<html>
<link rel="stylesheet" href="<?=baseUrl('dist/css/header_temp.css'); ?>">
<link rel="stylesheet" href="<?=baseUrl('dist/css/all.css'); ?>">
<link rel="stylesheet" href="<?=baseUrl('dist/css/all.min.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


    <div class="header">
      <div class="TopSection">
        <div class="FrameSection">
          <div class="ContactLogin">
            <div class="contact">
              <span>&#9993;&nbsp;&nbsp;contact@khana.af</span>
              <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <span>&#9743;&nbsp;&nbsp;+93728-224-181</span>
            </div>
            <div class="login">
                <a class="loginbtn" href="<?=baseUrl('auth/login.php');?>">Login</a>
                <a class="loginbtn" href="<?=baseUrl('auth/signup.php');?>">Sign Up</a>
            </div>
          </div>
        </div>
      </div>

      <div class="FrameSection">
        <div class="topbar">
          <div class="logo">
              <img class="logo-img" src="<?=baseUrl('dist/logo/logo.png'); ?>" width="140px" height="60px" />
          </div>
          <div class="para">
              <p>The biggest site for searching any kind of properties (Apartment,House,Land,Mortgage...)</p>
          </div>
        </div>
      </div>
    </div>
    <div class="MenuSection">
      <div class="navbar">
        <ul class="nav">
          <li class="active"><a href="<?=baseUrl('index.php');?>">Home</a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Properties Types</a>
            <div class="dropdown-content">
              <a href="<?=baseUrl('postmgmt/apartments.php');?>">Apartment</a>
              <a href="<?=baseUrl('postmgmt/houses.php');?>">House</a>
              <a href="<?=baseUrl('postmgmt/lands.php');?>">Land</a>
          </div>
          </li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Deal Types</a>
            <div class="dropdown-content">
              <a href="<?=baseUrl('postmgmt/mortgage.php');?>">Mortgage</a>
              <a href="<?=baseUrl('postmgmt/rent.php');?>">Rental</a>
              <a href="<?=baseUrl('postmgmt/sale.php');?>">For Sale</a>
          </div>
          </li>
          <li><a href="<?=baseUrl('about.php')?>">About Us</a></li>
          <li><a href="<?=baseUrl('contact.php')?>">Contact Us</a></li>
        </ul>
      </div>
    </div>
</html>
