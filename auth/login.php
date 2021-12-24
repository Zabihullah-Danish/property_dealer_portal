<?php require '../config/path.php';?>

<?php
  session_start();

  //$id = $_SESSION['id'];
  

  if(isset($_GET['passwordupdate']) && $_GET['passwordupdate']){
    echo "<script>alert('Password Updated!')</script>";
    
  }

  require '../config/dbconnection.php';
  //if post method get or set a value.
  if(isset($_POST['login1'])){

  $email = $_POST['email1'];
  $pass1 = $_POST['pass11'];
  $password = md5($pass1);
  $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
  $getresult = mysqli_query($con,$query);
  $showResult = mysqli_fetch_assoc($getresult);

  if($showResult){
    $_SESSION['uid'] = $showResult['uid'];
    $_SESSION['fname'] = $showResult['first_name'];
    $_SESSION['lname'] = $showResult['last_name'];
    header('location:'.baseUrl('postmgmt/postmgmt.php'));
  }
  else{
    $path = baseUrl('auth/login.php?loginerr=1');
    header('location:'.$path);
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
    <title>Login</title>
  </head>
  <body>

    <div class="signup1">
      <div class="signup_form_div1">
        <div class="logo">
          <a href="../index.php"><img src="<?=baseUrl('dist/images/logo.png');?>" alt="loading logo" width="160px" height="80px;"></a>
        </div>

        <hr />
        <h2>Login</h2>
        <?php
        if(isset($_GET['loginerr']) && $_GET['loginerr']==1){
          echo "<p style='color:red;'>Email or passowrd is incorrect</p>";
        }
         ?>
        <form class="signup_form" action="" method="post">
          <label for="email">Email</label><br>
          <input type="email" name="email1" value="<?php if(isset($_POST['email1'])) echo $_POST['email1']; ?>" required /><br>
          <label for="pass1">Password</label><br>
          <input type="password" name="pass11" required /><br>
          <input class="submit" type="submit" name="login1" value="Login" />
          <span>&nbsp;&nbsp;&nbsp;Don't have an account <a href="signup.php">Sign Up</a></span><br>
          <a href="forgetPass.php">Forget passwrod</a>
        </form>
      </div>
    </div>


    <footer>
    </footer>

  </body>
</html>
