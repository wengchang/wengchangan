<?php 
$width=mt_rand(200,300);
$height=mt_rand(40,70);
$num=mt_rand(4,6);

$bg=imagecreatetruecolor($width, $height);
$bg_color=imagecolorallocate($bg, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagefilledrectangle($bg, 0, 0,$width,$height, $bg_color);
$text='123456789qwertyuipasdfghjklzxcvbnmQWERTYUIPASDFGHJKLZXCVBNM';
$maxindex=strlen($text)-1;
$captcha='';
for ($i=0; $i <$num ; $i++) { 
	$captcha.=$text[mt_rand(0,$maxindex)];
}
session_start();
$_SESSION['capc']=$captcha;

$text_color=imagecolorallocate($bg, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
$font_w=imagefontwidth(5);
$font_h=imagefontheight(5);
$x=(($width/$num)-$font_w)/2;
$y=($height-$font_h)/2;
$n=($width/$num);
for ($i=0; $i <$num ; $i++) { 
	imagechar($bg, 5, $x+$n*$i, $y, $captcha[$i], $text_color);
}
for ($i=0; $i <mt_rand(200,800) ; $i++) {
	$pixel_color=imagecolorallocate($bg,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
	imagesetpixel($bg, mt_rand(0,200), mt_rand(0,50), $pixel_color);
}
for ($i=0; $i <mt_rand(5,15) ; $i++) {
	$line_color=imagecolorallocate($bg,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
	imageline($bg,  mt_rand(0,200), mt_rand(0,50), mt_rand(0,200), mt_rand(0,50), $line_color);
 }
header('content-type:image/png');
imagepng($bg);
