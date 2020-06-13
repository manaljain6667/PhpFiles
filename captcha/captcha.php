<?php
session_start();
$captcha_num = rand(1000, 9999);
$_SESSION['codee'] = $captcha_num;
 
$font_size = 30;
$img_width = 100;
$img_height = 50;
 
header('content-type: image/jpeg');
 
$image = imagecreate($img_width, $img_height); // create background image with dimensions
imagecolorallocate($image, 255, 255, 255); // set background color
 
$text_color = imagecolorallocate($image, 0, 0, 0); // set captcha text color
 
imagettftext($image, $font_size, 0, 15, 30, $text_color, 'font.TTF', $captcha_num);
imagejpeg($image);
?>