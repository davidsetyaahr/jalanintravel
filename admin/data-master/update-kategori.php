<?php 
	include "../../config/model.php";
	$tb = "categories";
	$where = "where category_id = '$_POST[category_id]'";
	if(empty($_FILES['icon']['name'])){
		$update = ["category_name = '$_POST[category_name]' "];
		update($tb,$update,$where);
		header("location:view-kategori");
	}
	else{
		if (move_uploaded_file($_FILES['icon']['tmp_name'],"../../assets/img/category/".$_FILES['icon']['name'])) {
			$update = ["category_name = '$_POST[category_name]' ","icon = '".$_FILES['icon']['name']."' "];
			update($tb,$update,$where);
			header("location:view-kategori");
		} else {
		   echo "File was not uploaded";
		}	
	}
?>