<?php

if($_SERVER['REQUEST_METHOD']=='POST'){


$errors = array();

require 'dbconnection.php';

//getting value from user interface for checking  and inserting to database.

$fname = mysqli_real_escape_string($con,trim($_POST['fname']));
$lname = mysqli_real_escape_string($con,trim($_POST['lname']));
$email = mysqli_real_escape_string($con,trim($_POST['email']));
$phone = mysqli_real_escape_string($con,trim($_POST['phone']));
$pass1 = mysqli_real_escape_string($con,trim($_POST['pass1']));
$pass2 = mysqli_real_escape_string($con,trim($_POST['pass2']));

//form validation.

if(empty($fname)){array_push($errors, "Firstname is required");}
if(empty($lname)){array_push($errors, "Lastname is required");}
if(empty($email)){array_push($errors, "Email is requrired");}
if(empty($phone)){array_push($errors, "phone number is required");}
if(empty($pass1)){array_push($errors, "Password is required");}
if($pass1 != $pass2){array_push($errors, "password do not match");}


//check database for existing emails and phone numbers.

$check_db_query = "SELECT * FROM users WHERE email = '$email' or phone = '$phone' LIMIT 1";
$results = mysqli_query($con,$check_db_query);
$check_email_phone = mysqli_fetch_assoc($results);

if($check_email_phone){

  if($check_email_phone['email']==$email){
    array_push($error,"Email address already used please try different email address");
  }
  if($check_email_phone['phone']==$phone){
    array_push($errors, "Phone number already exist please try differnet phone number.");
  }
}

//finally register user if there is no error.
if(count($errors)==0){
  $password = md5($pass1);// this will encrypt password.
  $sysdate = date('Y-m-s');// getting system date.
  $query = "INSERT INTO users ('first_name','last_name','email','phone','password','reg_date')
   values ('$fname','$lname','$email','$phone','$password','$sysdate')";
  mysqli_query($con,$query);
  $_SESSION['firstname']=$fname;
  $_SESSION['success']="You are logged in now";
  header('location: ../postmgmt/postmgmt.php');

}




}














 ?>
