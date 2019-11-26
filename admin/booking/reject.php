<?php
	include "../../config/model.php";
	$getId = get("select user_id from booking_package where kode_booking_package = '$_GET[kode]' ");
	insert("notif_user",["user_id","kode_booking_package","status","view"],["'".$getId[0]['user_id']."'","'".$_GET['kode']."'","'".$_GET['from']."'","'0'"]);
	header("location:detail-booking?q=$_GET[kode]");
?>