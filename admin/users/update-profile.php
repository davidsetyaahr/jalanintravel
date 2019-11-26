<?php 
	session_start();
	include "../../config/model.php";
	if($_POST['old']=="" && $_POST['new']==""){
		if(empty($_FILES['avatar']['name'])){
			header("location:profile");
		}
		else{
			$name = mt_rand()."-".$_FILES['avatar']['name'];
			move_uploaded_file($_FILES['avatar']['tmp_name'],"../../assets/img/avatar/".$name);
			mysqli_query($GLOBALS['con'],"update admin set avatar = '$name' where admin_id = '".$_SESSION['admin_id']."' ");
			header("location:profile?msg=success");
		}
	}
	else{
			$cek = get("select count(admin_id) ttl from admin where password = '".md5($_POST['old'])."' and admin_id = '".$_SESSION['admin_id']."' ");
			if(count($cek)==0){
				header("location:profile?error=Password Lama Tidak Sesuai");
			}
			else{
				if(empty($_FILES['avatar']['name'])){
					mysqli_query($GLOBALS['con'],"update admin set password = '".md5($_POST['new'])."' where admin_id = '".$_SESSION['admin_id']."' ");
					header("location:profile?msg=success");
				}
				else{
					$name = mt_rand()."-".$_FILES['avatar']['name'];
					move_uploaded_file($_FILES['avatar']['tmp_name'],"../../assets/img/avatar/".$name);
					mysqli_query($GLOBALS['con'],"update admin set password = '".md5($_POST['new'])."', avatar = '$name' where admin_id = '".$_SESSION['admin_id']."' ");
					header("location:profile?msg=success");
				}
		}
	}
?>