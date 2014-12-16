<?php
	//CAPTCHA Matching code
	session_start();
	if ($_SESSION["code"] == $_POST["captcha"]) {
		echo "Right TEXT Entered";
	} else {
		die("Wrong TEXT Entered");
	}
?>