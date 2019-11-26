<?php
	include "../../config/model.php";
	$tb = "province";
	$fields = ['province_name'];
	$values = ["'$_POST[provinsi]'"];
	insert($tb,$fields,$values);
	header("location:view-provinsi");
?>