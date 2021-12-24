<?php require '../config/path.php';?>

<?php
  session_start();

  require '../config/dbconnection.php';
  //if post method get or set a value.
  if(isset($_POST['verify'])){
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      

      $sql = "SELECT * FROM users WHERE email = '$email' && phone = '$phone'";
      $query = $con->query($sql);

      if($result = mysqli_fetch_assoc($query)){
        $_SESSION['uid'] = $result['uid'];
        header("location:".baseUrl('auth/resetPass.php'));
      }
      else{
        header("location:".baseUrl('auth/forgetPass.php?UserNotFound=1'));
      }
      
      
      

    }

    mysqli_close($con);

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
        <h2>Find User</h2>
        <?php 
          if(isset($_GET['UserNotFound']) && $_GET['UserNotFound'] == 1){ ?>

          <p style="color:red;">User Not Found!</p>
          <?php } ?>
        <form class="signup_form" action="" method="post">
          <label for="email">Email</label><br>
          <input type="email" name="email" value="" required /><br>
          <label for="phone">Phone</label><br>
          <input type="number" name="phone" required /><br>

          <input class="submit" type="submit" name="verify" value="Verify " />
          
        </form>
      </div>
    </div>


    <footer>
    </footer>

  </body>
</html>
