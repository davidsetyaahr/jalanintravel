<?php 
	include "../../config/model.php";
	$tb = "tour_guide";
	$where = "where tour_guide_id = '$_POST[tour_guide_id]'";
	if(empty($_FILES['photo']['name'])){
		$update = ["tour_guide_name = '$_POST[tour_guide_name]' ","nomor_handphone='$_POST[nomor_handphone]'","address = '$_POST[address]'","description='$_POST[description]'","Tarif ='$_POST[Tarif]'"];
		update($tb,$update,$where);
		header("location:view-tour-guide");
	}
	else{
		if (move_uploaded_file($_FILES['photo']['tmp_name'],"../../assets/img/tour-guide/".$_FILES['photo']['name'])) {
			$update = ["tour_guide_name = '$_POST[tour_guide_name]' ", "nomor_handphone = '$_POST[nomor_handphone]'","address ='$_POST[address]'","Tarif ='$_POST[Tarif]'","description ='$_POST[description]'","photo = '".$_FILES['photo']['name']."' "];
			update($tb,$update,$where);
			header("location:view-tour-guide");
		} else {
		   echo "File was not uploaded";
		}	
	}
?>