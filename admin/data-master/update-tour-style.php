<?php 
	include "../../config/model.php";
	$tb = "tour_style";
	$where = "where tour_style_id = '$_POST[tour_style_id]'";
	if (empty($_FILES['icon']['name'])){
		$update = ["tour_style_name = '$_POST[tour_style_name]' "];
		update($tb,$update,$where);
		header("location:view-tour-style");
	}
	else{
		if (move_uploaded_file($_FILES['icon']['tmp_name'],"../../assets/img/tour-style/".$_FILES['icon']['name'])){
			$update = ["tour_style_name = '$_POST[tour_style_name]' ","icon = '".$_FILES['icon']['name']."' "];
			update($tb,$update,$where);
			header("location:view-tour-style");
		}
		else{
			echo "file was not uploaded";
		}
	}
 ?>