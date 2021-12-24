<?php session_start(); ?>
<?php 
require '../config/path.php';
require '../config/dbconnection.php';
?>

<?php

    $uid = $_SESSION['uid'];


      if(isset($_POST['reset'])){
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        if($pass1 != $pass2){
            $path = baseUrl('auth/resetPass.php?p_error=1');
            header("location:". $path);
        }
        else{
          $sql = "UPDATE users SET password = md5('$pass1') WHERE uid = '$uid'";
          $query = mysqli_query($con,$sql);
          $q = mysqli_query($con,"SELECT uid FROM users WHERE uid = $uid");
          $result = mysqli_fetch_assoc($q);
            $_SESSION['id'] = $result['uid'];
            
          
          header("location:".baseUrl('auth/login.php?passwordupdate=1'));
        }
      }
      else{
      
        
        }
    
    


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=baseUrl('dist/css/login.css');?>">
    <title>Password Reset</title>
  </head>
  <body>

    <div class="signup1">
      <div class="signup_form_div1">
        <div class="logo">
          <a href="../index.php"><img src="<?=baseUrl('dist/images/logo.png');?>" alt="loading logo" width="160px" height="80px;"></a>
        </div>

        <hr />
        <h2>Password Reset</h2>
        <?php
        if(isset($_GET['p_error']) && $_GET['p_error']==1){
            echo "<p style='color:red;'>Password Not Match!</p>";
            
          }
        ?>
        
        <form class="signup_form" action="" method="post">
          <label for="pass1">New Password</label><br>
          <input type="password" name="pass1" value="" required /><br>
          <label for="pass2">Retype Password</label><br>
          <input type="password" name="pass2" required /><br>

          <input class="submit" type="submit" name="reset" value="Reset" />
          
        </form>
      </div>
    </div>


    <footer>
    </footer>

  </body>
</html>