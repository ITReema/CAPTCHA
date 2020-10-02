<?php
session_start();

// Generate captcha code
$lenght = 6;
$random_char = generateString($lenght);
$captcha_code  = substr($random_char, 0, $lenght);

// Assign captcha in session
$_SESSION['CAPTCHA_CODE'] = $captcha_code;

// Create captcha image 
$image_captcha = imagecreatetruecolor(285, 40);
$captcha_bg = imagecolorallocate($image_captcha, 255, 255, 255);
imagefill($image_captcha, 0, 0, $captcha_bg);
$captcha_text_color = imagecolorallocate($image_captcha, 0, 0, 0);
imagestring($image_captcha, 16, 90, 10, $captcha_code, $captcha_text_color);
imagejpeg($image_captcha);

// Generate captcha string
function generateString($length) {
  $include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ[{(!@#$%^/&*_+;?\:)}]";
  $charLength = strlen($include_chars);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $include_chars [rand(0, $charLength - 1)];
  }
  return $randomString;
}
?>

