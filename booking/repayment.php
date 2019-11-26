<?php
include "../config/model.php";
if(empty($_FILES['bukti']['name'])){
	header("location:../user/repayment?errorfile=Masukkan Bukti Pembayaran&q=".$_POST['kode_booking']);
}
else{
	$filename = rand()."-".$_FILES['bukti']['name'];
	if(move_uploaded_file($_FILES['bukti']['tmp_name'],"../assets/img/payment/".$filename)){
		update("booking_package",["status = '2'"],"where kode_booking_package = '".$_POST['kode_booking']."'");
		$list_pax = get("select sum(ttl) ttl from list_pax where kode_booking_package = '".$_POST['kode_booking']."'");
		$bayar = $list_pax[0]['ttl'] - ($list_pax[0]['ttl']*20/100);
		insert("payment",["kode_booking_package","nominal","bukti","tgl_bayar"],["'".$_POST['kode_booking']."'","'$bayar'","'$filename'","'".date('Y-m-d H:i:s')."'"]);
		insert("notif_admin",["kode_booking_package","status","view"],["'".$_POST['kode_booking']."'","'2'","'0'"]);

		header("location:../user/booking?msg=Successfully uploaded, wait for further confirmation");
	}
	else{
		header("location:../user/repayment?errorfile=Upload Gagal&q=".$_POST['kode_booking']);
	}
}
?>