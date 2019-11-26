<?php
include "../config/model.php";
if($_POST['payment_option']==""){
	header("location:../user/payment?error=Pilih Metode Pembayaran&q=".$_POST['kode_booking']);
}
else{
	if(empty($_FILES['bukti']['name'])){
		header("location:../user/payment?errorfile=Masukkan Bukti Pembayaran&q=".$_POST['kode_booking']);
	}
	else{
		$filename = rand()."-".$_FILES['bukti']['name'];
		if(move_uploaded_file($_FILES['bukti']['tmp_name'],"../assets/img/payment/".$filename)){
			$getPayment = get("select payment_option,sale from booking_package where kode_booking_package = '".$_POST['kode_booking']."' ");
			$list_pax = get("select sum(ttl) ttl from list_pax where kode_booking_package = '".$_POST['kode_booking']."'");
			if($getPayment[0]['payment_option']==""){
				$valueUpdate = ["payment_option = '".$_POST['payment_option']."'"];
				$filter = "where kode_booking_package = '".$_POST['kode_booking']."'";
				update("booking_package",$valueUpdate,$filter);
			}
			
			$ttl = ($list_pax[0]['ttl'] - ($getPayment[0]['sale'] * $list_pax[0]['ttl'] /100));
			if($_POST['payment_option']=="dp20"){
				$bayar = $ttl*20/100;
				update("booking_package",["status = '11'"],"where kode_booking_package = '".$_POST['kode_booking']."'");
				$status = 11;
			}
			else{
				update("booking_package",["status = '2'"],"where kode_booking_package = '".$_POST['kode_booking']."'");
				$status = 2;
				$bayar = $ttl;
			}
			insert("payment",["kode_booking_package","nominal","bukti","tgl_bayar"],["'".$_POST['kode_booking']."'","'$bayar'","'$filename'","'".date('Y-m-d H:i:s')."'"]);
			insert("notif_admin",["kode_booking_package","status","view"],["'".$_POST['kode_booking']."'","'$status'","'0'"]);

			header("location:../user/booking?msg=Successfully uploaded, wait for further confirmation");
		}
		else{
			header("location:../user/payment?errorfile=Upload Gagal&q=".$_POST['kode_booking']);
		}
	}
}
?>