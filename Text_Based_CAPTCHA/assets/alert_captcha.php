<?php
session_start();
if(!empty($_POST["submit"])) {
  $captcha = $_POST["captcha"];

  //alert captcha status
  $captcha_text = $_POST["captcha"];
  if(empty($captcha)) {
    $captchaError = array(
      "status" => "alert-danger",
      "alert" => "Please enter the captcha."
    );
  }
  else if($_SESSION['captcha'] == $captcha_text){
    $captchaError = array(
      "status" => "alert-success",
      "alert" => "Correct Captcha."
    );
  } else {
    $captchaError = array(
      "status" => "alert-danger",
      "alert" => "Invalid Captcha."
    );
  }
}  
?>
