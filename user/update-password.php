<?php 
	session_start();
	include "../config/model.php";
	$cekPass = get("select password from users where user_id = '".$_SESSION['user_id']."' ");
	if($cekPass[0]['password']==md5($_POST['password'])){
		$new = md5($_POST['newpass']);
		update("users",["password = '".$new."' "], "where user_id = '".$_SESSION['user_id']."' ");
		header("location:change-password?type=success&msg=Password Berhasil Diperbarui");
	}
	else{
		header("location:change-password?type=danger&msg=Periksa Password Anda");
	}
?>