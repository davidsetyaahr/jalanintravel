<?php
	include "../../config/model.php";
	include "../../config/function.php";

	if (move_uploaded_file($_FILES['logo']['tmp_name'],"../../assets/img/bank-option/".$_FILES['logo']['name'])) {
		$tb = "bank_option";
		$fields = ['bank_name', 'logo', 'rekening_number', 'fullname'];
		$values = ["'$_POST[bank_name]'","'".$_FILES['logo']['name']."', '$_POST[rekening_number]'","'$_POST[fullname]'"];
		insert($tb,$fields,$values);
		header("location:view-opsi-pembayaran");
	} else {
	   echo "File was not uploaded";
	}	
?>