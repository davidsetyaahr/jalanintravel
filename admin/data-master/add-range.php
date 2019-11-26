<?php
	include "../../config/model.php";
	$tb = "pax_categories";
	$fields = ['name_pax_category','range_age'];
	$values = ["'$_POST[name_pax_category]'","'$_POST[range1]-$_POST[range2]'"];
	insert($tb,$fields,$values);
	header("location:view-range");
?>