<?php
include "../config/model.php";
if($_POST['first']==""){
	$json['error_first'] = "Nama Depan Harap Diisi";
}
else{
	$json['error_first'] = "";
}
if($_POST['last']==""){
	$json['error_last'] = "Nama Belakang Harap Diisi";
}
else{
	$json['error_last'] = "";
}
if($_POST['email']==""){
	$json['error_email'] = "Email Harap Diisi";
}
else{
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$json['error_email'] = "Masukkan Email Yang Sesuai";
	}	
	else{
		$cek = get("select count(email) ttl from users where email = '$_POST[email]'");
		if($cek[0]['ttl']!=0){
			$json['error_email'] = "Email Sudah Terdaftar";
		}
		else{
			$json['error_email'] = "";
		}
	}
}
if($_POST['number']==""){
	$json['error_number'] = "Nomer Handphone Harap Diisi";
}
else{
	if(!is_numeric($_POST['number'])){
		$json['error_number'] = "Nomer Handphone Tidak Sesuai";
	}
	else{
		$json['error_number'] = "";
	}
}
if($_POST['password']==""){
	$json['error_pass'] = "Password Harap Diisi";
}
else{
	$json['error_pass'] = "";
}

if($_POST['repassword']!=$_POST['password']){
	$json['error_repass'] = "Password Tidak Sama";
}
else{
	$json['error_repass'] = "";
}
if($json['error_first']=="" && $json['error_last']=="" && $json['error_email']=="" && $json['error_number']=="" && $json['error_pass']=="" && $json['error_repass']==""){
	$json['error'] = "";
	$tb = "users";
	$fields = ['email','password','first_name','last_name','avatar'];
	$pass = md5($_POST['password']);
	$values = ["'$_POST[email]'","'$pass'","'$_POST[first]'","'$_POST[last]'","'default.png'"];
	insert($tb,$fields,$values);
}
else{
	$json['error'] = "yes";
}
header("content-type:json/application");
echo json_encode($json);
 ?>
