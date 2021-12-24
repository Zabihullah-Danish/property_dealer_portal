<?php
//  require '../config/loader.php';
 ?>
<!DOCTYPE html lang="en">
<html>



<link rel="stylesheet" href="<?=baseUrl('dist/css/header1_temp.css'); ?>">
<body>
    <div class="header">
      <div class="TopSection">
        <div class="FrameSection">
          <div class="ContactLogin">
            <div class="contact">
              <span>&#9993;&nbsp;&nbsp;khana.contact@gmail.com</span>
              <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <span>&#9743;&nbsp;&nbsp;+93728-224-181</span>
            </div>
            <div class="login">
                <?php
                if(isset($_SESSION['uid'])){
                  echo "<strong class='pname' style='color:lightblue;' title=''>".ucfirst($_SESSION['fname'])."</strong>"."&nbsp;".
                  "<strong class='pname' style='color:lightblue;'>".ucfirst($_SESSION['lname']).
                  "</strong>"."&nbsp;&nbsp;";
                  echo "<a class='loginbtn' href='../auth/logout.php'>Logout</a>";
                }
                ?>

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
          <li><a href="<?=baseUrl('postmgmt/postmgmt.php');?>">Home</a></li>
          <li><a href="<?=baseUrl('postmgmt/searchPost.php');?>">Show All Posts</a></li>
          <li><a href="<?=baseUrl('postmgmt/addNewPost.php');?>">Add New Post</a></li>
          <!-- <li><a href="<?=baseUrl('postmgmt/credit.php');?>">Property Credit</a></li> -->
        </ul>
      </div>
    </div>

</body>
</html>
