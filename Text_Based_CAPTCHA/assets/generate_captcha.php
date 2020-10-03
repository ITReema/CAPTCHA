<?php
session_start();
// Generate captcha code
$lenght = 6;
$random_chars = generateString($lenght);
$captcha_code  = substr($random_chars, 0, $lenght);

// Assign captcha in session
$_SESSION['captcha'] = $captcha_code;

// Create captcha image 
$image_captcha = imagecreatetruecolor(100, 40);
$captcha_bg = imagecolorallocate($image_captcha, 255, 255, 255);
imagefill($image_captcha, 0, 0, $captcha_bg);
// Random dots
$pixel_color = imagecolorallocate($image_captcha, 0,0,255);
for($i=0; $i<200; $i++) {
    imagesetpixel($image_captcha,rand()%100,rand()%40,$pixel_color);
}  
$captcha_text_color = imagecolorallocate($image_captcha, 0, 0, 0);
imagestring($image_captcha, 30, 25, 10, $captcha_code, $captcha_text_color);
imagejpeg($image_captcha);
header('Content-type: image/png');

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

