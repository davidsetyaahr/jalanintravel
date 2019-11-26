<?php 
session_start();
include "../../config/model.php";
$getId = get("select package_id from packages order by package_id desc limit 1");
$id = (empty($getId[0]['package_id']) ? 1 : $getId[0]['package_id']+1);
$insert['step1']['fields'] = array("package_name","duration_id","categories_id","tour_styles_id","img","overview","min_pax","max_pax","room_hotel_id","sale","url");
$url = strtolower(str_replace(" ", "-", "'".$_SESSION['package']['step1']['package_name']."'"));
$insert['step1']['values'] = array(
	"'".$_SESSION['package']['step1']['package_name']."'",
	"'".$_SESSION['package']['step1']['duration_id']."'",
	"'".$_SESSION['package']['step1']['category_id']."'",
	"'".$_SESSION['package']['step1']['tour_style_id']."'",
	"'".$_SESSION['package']['step1']['photoname']."'",
	"'".$_SESSION['package']['step1']['overview']."'",
	"'".$_SESSION['package']['step1']['min_pax']."'",
	"'".$_SESSION['package']['step1']['max_pax']."'",
	"'".$_SESSION['package']['step1']['room_id']."'",
	"'".$_SESSION['package']['step6']['sale']."'",
	 "$url");
//insert packages
insert("packages",$insert['step1']['fields'],$insert['step1']['values']);
rename("../../assets/img/temp/".$_SESSION['package']['step1']['photoname'], "../../assets/img/destinations/".$_SESSION['package']['step1']['photoname']);
$getDay = get("select duration_time from durations where duration_id = '".$_SESSION['package']['step1']['duration_id']."' ");
$day = 1;
for($i=0;$i<$getDay[0]['duration_time'];$i++) {
	$insert['step2']['fields'] = array("package_id","day");
	$insert['step2']['values'] = array($id,$day);
	//insert package_package
	insert("package_detail",$insert['step2']['fields'],$insert['step2']['values']);


	$idDetail = get("select detail_package_id from package_detail order by detail_package_id desc limit 1");
	foreach ($_SESSION['package']['step3']['destination_id'][$i] as $key => $value) {
		$insert['step3']['fields'] = array("detail_package_id","destination_id","title","category_id","tour_styles_id","start_time","end_time","description");
		$insert['step3']['values'] = array(
			"'".$idDetail[0]['detail_package_id']."'",
			"'$value'",
			"'".$_SESSION['package']['step3']['title'][$i][$key]."'",
			"'".$_SESSION['package']['step3']['category_id'][$i][$key]."'",
			"'".$_SESSION['package']['step3']['tour_style_id'][$i][$key]."'",
			"'".$_SESSION['package']['step3']['start'][$i][$key]."'",
			"'".$_SESSION['package']['step3']['end'][$i][$key]."'",
			"'".$_SESSION['package']['step3']['description'][$i][$key]."'"
		);
		//insert itinerary
		insert("itinerary",$insert['step3']['fields'],$insert['step3']['values']);
	}
	$day++;
}
	foreach ($_SESSION['package']['step4']['office_id'] as $keyOff => $valueOff) {
		$insert['step4']['fields'] = array("package_id","office_id","day_departure","time_departure","accommodation_id");
		$insert['step4']['values'] = array(
			"'$id'",
			"'$valueOff'",
			"'".$_SESSION['package']['step4']['departure_day'][$keyOff]."'",
			"'".$_SESSION['package']['step4']['departure_time'][$keyOff]."'",
			"'".$_SESSION['package']['step4']['accommodation_id'][$keyOff]."'",
		);
		//insert packages_price
		insert("packages_price",$insert['step4']['fields'],$insert['step4']['values']);

		$getPriceId = get("select price_id from packages_price order by price_id desc limit 1");

		foreach ($_SESSION['package']['step5']['pax_category_id'][$keyOff] as $keyPax => $valuePax) {
			$insert['step5']['fields'] = array("price_id","pax_category_id","price");
			$insert['step5']['values'] = array("'".$getPriceId[0]['price_id']."'","'$valuePax'","'".$_SESSION['package']['step5']['price'][$keyOff][$keyPax]."'");
			//insert package_price_detail
			insert("packages_price_detail",$insert['step5']['fields'],$insert['step5']['values']);

		}
	}
unset($_SESSION['package']);
header("location:add-package?msg=success");
?>