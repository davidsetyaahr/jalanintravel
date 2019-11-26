<?php
	include "../../config/model.php";
	$tb = "pax_categories";
	$where = "where pax_category_id = '$_POST[pax_category_id]'";
		$update = ["name_pax_category = '$_POST[name_pax_category]'","range_age = '$_POST[range1]-$_POST[range2]'"];
		update($tb,$update,$where);
		header("location:view-range");
?>
