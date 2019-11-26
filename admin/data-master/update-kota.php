<?php
	include "../../config/model.php";
	$tb = "city";
	$where = "where city_id = '$_POST[city_id]'";
	$update = ["city_name = '$_POST[city_name]'","province_id = '$_POST[province_id]'"];
	update($tb,$update,$where);
	header("location:view-kota");
?>