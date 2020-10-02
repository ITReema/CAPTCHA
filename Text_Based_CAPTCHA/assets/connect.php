<?php
session_start();
if(!empty($_POST["submit"])) {
  $captcha = $_POST["captcha"];

  //captcha status
  $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
  if(empty($captcha)) {
    $captchaError = array(
      "status" => "alert-danger",
      "message" => "Please enter the captcha."
    );
  }
  else if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
    $captchaError = array(
      "status" => "alert-success",
      "message" => "Correct Captcha."
    );
  } else {
    $captchaError = array(
      "status" => "alert-danger",
      "message" => "Invalid Captcha."
    );
  }
}  
?>