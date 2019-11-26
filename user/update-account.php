<?php 
	session_start();
	include "../config/model.php";
	$tb = "users";
	$where = "where user_id = '$_SESSION[user_id]' ";
	if(empty($_FILES['avatar']['name'])){
		$update = ["first_name = '$_POST[first_name]'","last_name = '$_POST[last_name]'"];
	}else{
		$name = mt_rand()."-".$_FILES['avatar']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'],"../assets/img/avatar/".$name);
		$update = ["first_name = '$_POST[first_name]'","last_name = '$_POST[last_name]'","avatar = '$name'"];		
	}
	$_SESSION['first_name'] = $_POST['first_name'];
	update($tb,$update,$where);
	header("location:account?msg=success");
?>