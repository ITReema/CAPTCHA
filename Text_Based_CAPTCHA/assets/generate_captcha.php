<?php
// Starting session
session_start();
// Generate captcha code
// number characters in image captcha
$lenght = 6;
// Generate a random character
$random_chars = generateString($lenght);
// The substr() function returns a part of a string.
// substr(string,start,length)
$captcha_code  = substr($random_chars, 0, $lenght);

// Assign captcha in session
// The capcha stored for the session
$_SESSION['captcha'] = $captcha_code;

// Create captcha image 
// Create a new true color image
// imagecreatetruecolor ( int $width , int $height )
$image_captcha = imagecreatetruecolor(100, 40);
// Allocate a color for an image
// imagecolorallocate ( resource $image , int $red , int $green , int $blue )
$captcha_bg = imagecolorallocate($image_captcha, 255, 255, 255);
// fill the image with the given color
// imagefill ( resource $image , int $x , int $y , int $color )
imagefill($image_captcha, 0, 0, $captcha_bg);
// Random dots
$pixel_color = imagecolorallocate($image_captcha, 0,0,255);
for($i=0; $i<200; $i++) {
	// imagesetpixel() draws a pixel at the specified coordinate.
	// imagesetpixel ( resource $image , int $x , int $y , int $color )
	// rand — Generate a random integer, rand()%50 return 0 to 49
    imagesetpixel($image_captcha, rand()%200, rand()%50, $pixel_color);
}
// Random Line
$line_color = imagecolorallocate($image_captcha, 0,0,64); 
for($i=0; $i<4; $i++) {
	// imageline to Draw a line, Draws a line between the two given points.
	// imageline ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )
    imageline($image_captcha, 0, rand()%50, 100, rand()%50, $line_color);
}
// text color black 
$captcha_text_color = imagecolorallocate($image_captcha, 0, 0, 0);
// Draws a string at the given coordinates.
// imagestring ( resource $image , int $font , int $x , int $y , string $string , int $color )
imagestring($image_captcha, 30, 25, 10, $captcha_code, $captcha_text_color);
// Output the image
// imagejpeg() creates a JPEG file from the given image.
imagejpeg($image_captcha);
// Free up memory
// imagedestroy ( resource $image )
imagedestroy($image_captcha);

// Generate captcha string
function generateString($length) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789[{(!@#$%^/&*_+;?\:)}]";
  // strlen use to get string length
  $charLength = strlen($chars);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $chars [rand(0, $charLength - 1)];
  }
  return $randomString;
}
?>
