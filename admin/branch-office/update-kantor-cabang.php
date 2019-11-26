<?php 
	include "../../config/model.php";
	$tb = "branch_office";
	$where = "where office_id = '$_POST[office_id]'";
	if(empty($_FILES['img']['name'])){
	$update = ["city_id = '$_POST[city_id]'","address = '$_POST[address]'","phone_number = '$_POST[phone_number]'"];
		update($tb,$update,$where);
		header("location:view-kantor-cabang");

	}
	else{
		if (move_uploaded_file($_FILES['img']['tmp_name'], "../../assets/img/branch-office/".$_FILES['img']['name'])){
			$update = ["city_id = '$_POST[city_id]' ","address = '$_POST[address]' ","phone_number = '$_POST[phone_number]' ","img = '".$_FILES['img']['name']."' "];
			update($tb,$update,$where);
			header("location:view-kantor-cabang");
		} else {
			echo "File Was Not Found";
		}
	}

?>