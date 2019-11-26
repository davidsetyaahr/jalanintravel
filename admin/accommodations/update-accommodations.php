<?php 
	include "../../config/model.php";
	$tb = "accommodations";
	$where = "where accommodation_id = '$_POST[accommodation_id]'";
	if(empty($_FILES['photo']['name'])){
		$update = ["accommodation_name = '$_POST[accommodation_name]' "];
		update($tb,$update,$where);
		header("location:view-accommodations");
	}
	else{
		if (move_uploaded_file($_FILES['photo']['tmp_name'],"../../assets/img/accommodation/".$_FILES['photo']['name'])) {
			$update = ["accommodation_name = '$_POST[accommodation_name]' ","photo = '".$_FILES['photo']['name']."' "];
			update($tb,$update,$where);
			header("location:view-accommodations");
		} else {
		   echo "File was not uploaded";
		}	
	}
?>