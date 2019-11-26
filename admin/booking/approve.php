<?php
	include "../../config/model.php";
	if($_GET['from']==99){
		$status = 0;
	}
	else if($_GET['from']==11){
		$status = 1;
	}
	else{
		$status = 3;
	}
	update("booking_package",["status = '$status'"],"where kode_booking_package = '".$_GET['kode']."'");
	$getId = get("select user_id from booking_package where kode_booking_package = '$_GET[kode]' ");
	insert("notif_user",["user_id","kode_booking_package","status","view"],["'".$getId[0]['user_id']."'","'".$_GET['kode']."'","'$status'","'0'"]);
	header("location:detail-booking?q=$_GET[kode]");
?>