<?php
	include "../../config/model.php";
	include "../../config/function.php";

	if (move_uploaded_file($_FILES['photo']['tmp_name'],"../../assets/img/accommodation/".$_FILES['photo']['name'])) {
		$tb = "accommodations";
		$fields = ['accommodation_name','photo'];
		$values = ["'$_POST[accommodations_name]'","'".$_FILES['photo']['name']."'"];
		insert($tb,$fields,$values);
		header("location:view-accommodations");
	} else {
	   echo "File was not uploaded";
	}	
?>