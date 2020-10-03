<?php
session_start();

// Generate captcha code
$lenght = 6;
$random_chars = generateString($lenght);
$captcha_code  = substr($random_chars, 0, $lenght);

// Assign captcha in session
$_SESSION['captcha'] = $captcha_code;

// Create captcha image 
$image_captcha = imagecreatetruecolor(285, 40);
$captcha_bg = imagecolorallocate($image_captcha, 255, 255, 255);
imagefill($image_captcha, 0, 0, $captcha_bg);
$captcha_text_color = imagecolorallocate($image_captcha, 0, 0, 0);
imagestring($image_captcha, 16, 90, 10, $captcha_code, $captcha_text_color);
imagejpeg($image_captcha);

// Generate captcha string
function generateString($length) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789[{(!@#$%^/&*_+;?\:)}]";
  $charLength = strlen($chars);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $chars [rand(0, $charLength - 1)];
  }
  return $randomString;
}
?>

