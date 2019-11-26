<?php
	include "../../config/model.php";
	include "../../config/function.php";

	if (move_uploaded_file($_FILES['icon']['tmp_name'],"../../assets/img/category/".$_FILES['icon']['name'])) {
		$tb = "categories";
		$fields = ['category_name', 'icon'];
		$values = ["'$_POST[kategori]'","'".$_FILES['icon']['name']."'"];
		insert($tb,$fields,$values);
		header("location:view-kategori");
	} else {
	   echo "File was not uploaded";
	}	
?>