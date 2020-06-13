<?php
session_start();
    
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
    $string=substr(str_shuffle($str_result), 0, 5);
    $_SESSION["code"]=$string;

$font_size=30;
$img_height=40;
$img_width=70;

header('Content-type: image/jpeg');
$image=imagecreate($img_width, $img_height);
imagecolorallocate($image, 255, 255, 255);

$text_color=imagecolorallocate($image, 0, 0, 0);
imagettftext($image, $font_size, 0, 15, 30, $text_color, 'font.ttf',$string );
imagejpeg($image);

?>