<?php
	session_start(); // Staring Session
	$captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; // Initializing PHP variable with string
	$captchanumber = substr(str_shuffle($captchanumber), 0, 6); // Getting first 6 word after shuffle.
	$_SESSION["code"] = $captchanumber; // Initializing session variable with above generated sub-string
	$image = imagecreatefromjpeg("bj.jpg"); // Generating CAPTCHA
	$foreground = imagecolorallocate($image, 187, 255, 184); // Font Color
	imagestring($image, 5, 20, 15, $captchanumber, $foreground);
	header('Content-type: image/png');
	imagepng($image);
?>