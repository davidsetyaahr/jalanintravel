<?php 
	include "../../config/model.php";
	if(empty($_POST['tour_guide_id'])){
		header("location:set-guide?kode=$_POST[kode]&error=empty");
	}
	else{
		mysqli_query($GLOBALS['con'],"update booking_package set tour_guide_id = '$_POST[tour_guide_id]' where kode_booking_package = '$_POST[kode]' ");
		header("location:approve?kode=$_POST[kode]&from=2");
	}
?>