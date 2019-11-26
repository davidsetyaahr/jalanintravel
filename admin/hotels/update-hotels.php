<?php
	include "../../config/model.php";
	$tb = "hotels";
	$where = "where hotel_id = '$_POST[hotel_id]'";
	if(empty($_FILES['photo']['name'])){
		$update = ["hotel_name ='$_POST[hotel_name]'","star ='$_POST[star]'","address ='$_POST[address]'","descriptions ='$_POST[descriptions]'"];
		update($tb,$update,$where);
		header("location:view-data-hotels");
	}
	else{
		if (move_uploaded_file($_FILES['photo']['tmp_name'],"../../assets/img/hotels/".$_FILES['photo']['name'])){
			$update = ["hotel_name = '$_POST[hotel_name]'","photo = '".$_FILES['photo']['name']."'","star ='$_POST[star]'","address ='$_POST[address]'","descriptions ='$_POST[descriptions]'"];
			update($tb,$update,$where);
			header("location:view-data-hotels");
		}else {
			echo "file was not uploaded";
		}
	}
?>
