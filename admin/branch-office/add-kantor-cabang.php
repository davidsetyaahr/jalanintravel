<?php
	include "../../config/model.php";
	include "../../config/function.php";
	if (move_uploaded_file($_FILES['img']['tmp_name'], "../../assets/img/branch-office/".$_FILES['img']['name'])) {
		$tb = "branch_office";
		$fields = ['city_id','address','phone_number','img'];
		$values = ["'$_POST[Id_Kota]'","'$_POST[Alamat]'","'$_POST[Nomor_Handphone]'","'".$_FILES['img']['name']."'"];
		insert($tb,$fields,$values);
	header("location:view-kantor-cabang");
	}
	else {
		echo "file was not uploaded";
	}
?>