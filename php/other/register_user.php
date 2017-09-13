<?php
	session_start();
	require "../classes/register.php";
	require "../classes/users.php";

	if(isset($_POST['email_address'])){

		$registration  = new Registration();
		$registrationSuccess = $registration->register_user(trim($_POST['email_address']), $_POST['indexnumber']);
		if($registrationSuccess){
			echo "";
		}
	}elseif(isset($_POST['password_change'])){
		$voter = new Users();
		if($voter->resetPassword($_POST['newpassword'], $_POST['indexnumber'])){
			echo "<h1 style='color:#2980B9;text-align:center'>Password updated successfully!</h1>
				<a href='../../vote/' style='background: #2980B9;padding: 10px; border-radius: 3px; display: block; width: 100px; text-align: center; color: #fff; text-decoration: none; margin: 0 auto;'>Home</a>
			";
		}
	}
?> 