<?php 
	include "../../config/model.php";
	$tb = "durations";
	$fields = ['duration_time'];
	$values = ["'$_POST[durasi]'"];
	insert($tb,$fields,$values);
	header("location:view-durasi.php");
?>