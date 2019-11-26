<?php 
session_start();
include "../../config/model.php";
$admin = get("select count(admin_id) ttl, admin_id from admin where username = '$_POST[username]' and password = '".md5($_POST['password'])."' ");
if($admin[0]['ttl']==0){
	header("location:../?error=true");
}
else{
	$_SESSION['admin_id'] = $admin[0]['admin_id'];
	header("location:../dashboard");
}
?>