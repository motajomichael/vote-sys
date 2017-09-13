<?php
	session_start();
    require_once "allFunctions.php";
    require_once "../classes/db_connection.php";
    require_once "../classes/users.php";

    if (!empty($_POST['index_number'])) {
		$user = $_POST['index_number'];
		$pass = $_POST['pass'];

		if (Users::auth($user, $pass)) {
			$_SESSION['user'] = $user;
			redirect_to("../../vote");
		}
		else echo "<h1 style='color:#2980B9;text-align:center'>Password username combination wrong</h1>'";
	}elseif(isset($_POST['adminform'])){
		if(Users::auth_admin($_POST['admin_user'], $_POST['pass'])) {
			$_SESSION['admin_state'] = $_POST['admin_user'];
			redirect_to('../../admin');
		}
	}elseif(isset($_GET['action']) && $_GET['action'] == 'signOut') {
		session_destroy();
		redirect_to('../../login');
	}
	
?> 