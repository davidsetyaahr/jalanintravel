<?php 
	include "../../config/model.php";
	$tb = "bank_option";
	$where = "where bank_id = '$_POST[bank_id]'";
	if (empty($_FILES['logo']['name'])){
		$update = ["bank_name = '$_POST[bank_name]' ", "rekening_number = '$_POST[rekening_number]' ","fullname = '$_POST[fullname]'"];
		update($tb,$update,$where);
		header("location:view-opsi-pembayaran");
	}
	else{
		if (move_uploaded_file($_FILES['logo']['tmp_name'],"../../assets/img/bank-option/".$_FILES['logo']['name'])){
			$update = ["bank_name = '$_POST[bank_name]' ", "rekening_number = '$_POST[rekening_number]' ","logo = '".$_FILES['logo']['name']."' "];
			update($tb,$update,$where);
			header("location:view-opsi-pembayaran");
		}
		else{
			echo "file was not uploaded";
		}
	}
 ?>