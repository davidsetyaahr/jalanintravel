<?php
	session_start();
	include "../config/function.php";
	include "../config/model.php";

	if(empty($_POST['email']) && empty($_POST['password'])){
		include "../error/404.php";
	}
	else{
		$email = $_POST['email'];
		$pass =  md5($_POST['password']);
		$account = get("select user_id,first_name from users where email = '$email' and password = '$pass' ");
		if(count($account)==0){
			header("location:".base_url()."user/signin?error=true");
		}
		else{
			$_SESSION['user_id'] = $account[0]['user_id'];
			$_SESSION['first_name'] = $account[0]['first_name'];
			header("location:".base_url());
		}
	}
?>
