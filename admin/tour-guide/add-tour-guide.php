<?php
	include "../../config/model.php";
	include "../../config/function.php";

	if (move_uploaded_file($_FILES['photo']['tmp_name'],"../../assets/img/tour-guide/".$_FILES['photo']['name'])) {
		$tb = "tour_guide";
		$fields = ['tour_guide_name','photo','nomor_handphone','address','description','Tarif'];
		$values = ["'$_POST[tour_guide_name]'","'".$_FILES['photo']['name']."','$_POST[nomor_handphone]'","'$_POST[address]'","'$_POST[description]'","'$_POST[tarif]'"];
		insert($tb,$fields,$values);
		header("location:view-tour-guide");
	} else {
	   echo "File was not uploaded";
	}	
?>