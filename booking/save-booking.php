<?php 
$kode = get("select max(kode_booking_package) kode from booking_package limit 1");
if($kode[0]['kode']==""){
	$kodeBooking = "JLN00001";
}
else{
	$num = (int)substr($kode[0]['kode'], 3,5);
	$num++;
	$kodeBooking = "JLN".sprintf("%05s", $num);
}
$attachment = implode(",", $_SESSION['booking']['attachment']);
$fields = ["kode_booking_package","package_id","user_id","start_tour","price_id","address_start","booking_date","sale","attachment","status"];
$values = ["'$kodeBooking'","'".$package[0]['package_id']."'","'".$_SESSION['user_id']."'","'".$_SESSION['booking']['start_tour']."'","'".$_SESSION['booking']['price_id']."'","'".$_SESSION['booking']['alamat']."'","'".date('Y-m-d H:i:s')."'","'".$package[0]['sale']."'","'$attachment'","'99'"];

insert("booking_package",$fields,$values);
$fields2 = ["kode_booking_package","pax_category_id","pax","ttl"];
foreach ($_SESSION['booking']['pax'] as $pax) {
	$getPrice = get("select price,sale from packages_price_detail where price_id = '".$_SESSION['booking']['price_id']."' and pax_category_id = '".$pax[0]."' ");;
	$price = ($getPrice[0]['sale']==0) ? $getPrice[0]['price'] : $getPrice[0]['price'] - ($getPrice[0]['price']*$getPrice[0]['sale']/100);
	$priceFix = $price * $pax[1]; 
	if($pax[1]>0){
		$values2 = ["'".$kodeBooking."'","'".$pax[0]."'","'".$pax[1]."'","'$priceFix'"];
		insert("list_pax",$fields2,$values2);
	}
}
insert("notif_admin",["kode_booking_package","status","view"],["'".$kodeBooking."'","'99'","'0'"]);
unset($_SESSION['booking']);
?>