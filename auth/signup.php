<head>
  <meta charset='utf-8'>
</head>

  <?php

    session_start();

  require '../config/path.php';
  require '../config/dbconnection.php';
  //require '../config/auth.php';
    $errors = array();
  if($_SERVER['REQUEST_METHOD']=='POST'){



    //check firstname if not entered.
    if(empty($_POST['fname']) or ctype_space($_POST['fname'])){
      $errors[] = 'firstname is required';
    }
    else{
      $fname = trim($_POST['fname']);
    }
    //check lastname if not entered.
    if(empty($_POST['lname']) or ctype_space($_POST['lname'])){
      $errors[] = 'lastname is required.';
    }
    else{
      $lname = mysqli_real_escape_string($con,trim($_POST['lname']));
    }
    //check email if not entered.
    if(empty($_POST['email']) or ctype_space($_POST['email'])){
      $errors[] = 'Email address is required.';
    }
    else{
      $email = trim($_POST['email']);
    }
    //check phone number if not entered.
    if(empty($_POST['phone']) or ctype_space($_POST['phone'])){
      $errors[] = 'Phone number is required.';
    }
    elseif(strlen($_POST['phone'])!=10){
      $errors[] = 'Phone number must be 10 digit.';
    }

    else{
      $phone = trim($_POST['phone']);
    }

    if(empty($_POST['ag_name']) OR ctype_space($_POST['ag_name'])){
      $errors[] = "Please Enter Agency Name";
    }else{
      $ag_name = mysqli_real_escape_string($con,trim($_POST['ag_name']));
    }

    if(empty($_POST['ag_location']) OR ctype_space($_POST['ag_location'])){
      $errors[] = "Please enter agency location";
    }else{
      $ag_location = mysqli_real_escape_string($con,trim($_POST['ag_location']));
    }

    if(!empty($_POST['pass1'])){
      if($_POST['pass1'] != $_POST['pass2']){
        $errors[] = 'Password do not match';
      }
      if(strlen($_POST['pass1'])<6){
        $errors[] = 'Password must be at lease 6 character.';
      }
      else{
        $password = trim($_POST['pass1']);
      }
    }
    else{
      $errors[] = 'you did not enter your password';
    }
    //query to check email and phone for duplication.
    $check_email_phone = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
    $getEmailPhone = mysqli_query($con,$check_email_phone);
    $emphResult = mysqli_fetch_assoc($getEmailPhone);
    if($emphResult){
      if($emphResult['email'] === $email){
        $errors[] = 'Email address already registered please use another one';
      }
      if($emphResult['phone'] === $phone){
        $errors[] = 'Phone number already used please try another one.';
      }
    }
    //if there is no error register the user.
    if(count($errors) == 0){
      $encryptpass = md5($password);
      $sysdate = date('Y-m-d');
      $query = "INSERT INTO users (`first_name`,`last_name`,`email`,`phone`,`agency_name`,`agency_location`,`password`,`reg_date`)
       VALUES ('$fname','$lname','$email','$phone','$ag_name','$ag_location','$encryptpass', '$sysdate')";
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      mysqli_query($con,$query) or die(mysqli_eror($con));
      $last_id = mysqli_insert_id($con);
       //retrieve data from db.
       $sql = "SELECT * FROM users WHERE uid ='$last_id'";
       $rel = mysqli_query($con,$sql);
       $row = mysqli_fetch_assoc($rel);
       //if the query passed successfully.

       if($row){
           $_SESSION['uid'] = $row['uid'];
           $_SESSION['fname'] = $row['first_name'];
           $_SESSION['lname'] = $row['last_name'];
           $_SESSION['email'] = $row['email'];
           echo "<script>alert('User Registered!!!')</script>";
           header('location:'.baseUrl('postmgmt/postmgmt.php'));
         }
       //if data retrieve not success display error message.
       else{
         echo "<h3>system error</h3>";
         echo "<h2>".mysqli_error($con)."<h2>";
         //header('location: signup.php');
       }
       mysqli_close($con);//closing the db.

    }//count errors array end.


  }//end of main submit condition.

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/signup.css">
    <title>Sign Up</title>
  </head>
  <body>
    <div class="signup">
      <div class="signup_form_div">
        <div class="logo">
          <a href="../index.php"><img src="<?=baseUrl('dist/images/logo.png');?>" alt="loading logo" width="160px" height="80px;"></a>
        </div>
        <hr />
        <h2>Register your self</h2>
        <?php
        if(count($errors) > 0){
          echo "<h3 style='color:red;'>Errors</h3>";
          foreach($errors as $error){
            echo "<p style='color:red;'> - $error </p>";
          }
        }
        ?>
        <form class="signup_form" action="" method="post">
          <label for="fname">First Name <span style="color:red;">*</span></label><br>
          <input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" required /><br>
          <label for="lname">Last Name <span style="color:red;">*</span></label><br>
          <input type="text" name="lname" value="<?=(isset($_POST['lname']))?$_POST['lname']:''?>" required /><br>
          <label for="email">Email <span style="color:red;">*</span></label><br>
          <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required><br>
          <label for="phone">Phone <span style="color:red;">*</span></label><br>
          <input type="number" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" required /><br>
          <label for="ag_name">Agency Name <span style="color:red;">*</span></label><br>
          <input type="text" name="ag_name" value="<?php if(isset($_POST['ag_name'])) echo $_POST['ag_name']; ?>" ><br>
          <label for="ag_location">Agency Location <span style="color:red;">*</span></label><br>
          <input type="text" name="ag_location" value="<?php if(isset($_POST['ag_location'])) echo $_POST['ag_location']; ?>" ><br>
          <label for="pass1">New Password <span style="color:red;">*</span></label><br>
          <input type="password" name="pass1" required /><br>
          <label for="pass2">Confirm Passowrd <span style="color:red;">*</span></label><br>
          <input type="password" name="pass2" required /><br>
          <input class="submit" type="submit" name="register" value="Register" />
          <span>&nbsp;&nbsp;&nbsp;Already have an account <a href="login.php">Login</a></span>
        </form>
      </div>
    </div>


    <footer>
    </footer>

  </body>
</html>
