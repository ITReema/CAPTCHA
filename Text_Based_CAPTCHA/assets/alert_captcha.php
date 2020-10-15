<?php
// Starting session
session_start();
// collect value of input field
if(!empty($_POST["submit"])) {
  $captcha = $_POST["captcha"];
  //alert captcha status
  $captcha_text = $_POST["captcha"];
  // if user doesn't enter CAPTCHA
  if(empty($captcha)) {
    $captchaError = array(
      "status" => "alert-danger",
      "alert" => "Please enter the characters in the image"
    );
  }
  // if user enter correct CAPTCHA
  else if($_SESSION['captcha'] == $captcha_text){
    $captchaError = array(
      "status" => "alert-success",
      "alert" => "Correct CAPTCHA"
    );
  } 
  // if user enter invalid CAPTCHA
  else {
    $captchaError = array(
      "status" => "alert-warning",
      "alert" => "Invalid CAPTCHA, please try again"
    );
  }
}  
?>
