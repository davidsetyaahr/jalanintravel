<?php
	include "../../config/model.php";
	$tb = "province";
	$where = "where province_id = '$_POST[province_id]'";
		$update = ["province_name = '$_POST[province_name]' "];
		update($tb,$update,$where);
		header("location:view-provinsi");
?>
