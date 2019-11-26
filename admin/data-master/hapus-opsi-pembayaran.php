<?php 
	include "../../config/model.php";
	delete ("bank_option","where bank_id = '$_GET[id_bank]'");
	header ("location:view-opsi-pembayaran");
 ?>