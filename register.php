<?php
	session_start();
	// DB credetials
	include('config.inc.php');
	
	function createPassword()
	{
	    $text = md5(uniqid(rand(), true));
	    return substr($text, 0, 10);
	}

	function createSalt()
	{
		$text = md5(uniqid(rand(), true));
		return substr($text, 0, 3);
	}	
	// Fetching Values
	$fname=$_POST['fname1']; 
	$sname=$_POST['sname1'];
	$email=$_POST['email1'];
	$age=$_POST['age1'];
	$sex=$_POST['sex1'];
	$country=$_POST['country1'];
	$city=$_POST['city1'];
	$pcode=$_POST['pcode1'];
	if (isset($fname) && isset($sname) && isset($email) && isset($age) && isset($sex) && isset($country) && isset($city) && isset($pcode))
	{
		if(strlen($fname) > FNAME_LEN) {header('Location: index.html'); }
		if(strlen($sname) > SNAME_LEN) {header('Location: index.html'); }
		if(strlen($email) > EMAIL_LEN) {header('Location: index.html'); }
		if(strlen($age) > AGE_LEN) {header('Location: index.html'); }
		if(strlen($sex) > SEX_LEN) {header('Location: index.html'); }
		if(strlen($country) > COUNTRY_LEN) {header('Location: index.html'); }
		if(strlen($city) > CITY_LEN) {header('Location: index.html'); }
		if(strlen($pcode) > POSTCODE_LEN) {header('Location: index.html'); }
		// Check if e-mail address syntax is valid or not
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Wrong Email! Please type correct email!";
		}else{
			$connection = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD); // Establishing connection with server..
			$db = mysql_select_db(DB_NAME, $connection); // Selecting Database.		
			$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
			// Entered email should be unique
			$result = mysql_query("SELECT * FROM ".DB_TABLE_NAME." WHERE email='$email'");
			$data = mysql_num_rows($result);
			if(($data)==0){
				//sanitize firstname and secondname
				$fname_len=strlen(mysql_real_escape_string($fname));
				$f_u_len = ($fname_len % 2)-1;
				$sname_len=strlen(mysql_real_escape_string($sname));
				$s_u_len = ($sname_len % 2)-1;
				$username=substr(strtolower($fname), 0, $f_u_len)."_".substr(strtolower($sname), 0, $s_u_len);
				$pw = createPassword();
				$salt = createSalt();
				$hash = hash('sha256', $pw);
				$password = hash('sha256', $salt . $hash);
				// Insert query
				$qstr="insert into ".DB_TABLE_NAME."(fname,sname,email,age,sex,country,city,postcode,username, password) 
				values ('$fname','$sname','$email',$age,'$sex','$country','$city','$pcode','$username','$password')";
				$query = mysql_query($qstr);
				if($query){
					echo "You have Successfully Registered!";
					$body=MAIL_SUBJECT."\nDear ".$fname."!\n You Successfully Registered!\n Your username: ".$username."\nYour password: ".$password."\n
					Thank you for choosing our product.";
					mail($email, MAIL_SUBJECT, $body);
				}else
				{
					echo "During insert statament perform some Error! Technical problem!\n";
				}
			}else{
				echo "This email [".$email."] is already registered, Please try another email...";
			}
		}
		mysql_close ($connection);
	} 
	else
	{
		echo "POST no return expacted data!";
	}
?>