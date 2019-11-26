<?php 
session_start();
include "../../config/model.php";
include "../../config/function.php";

$fields = array("title","duration_id","room_id","trans_id","departure","address","ktp","user_id","url","status");
$url = strtolower(str_replace(" ", "-", $_SESSION['custom']['step5']['title']));
$values = array(
	"'".$_SESSION['custom']['step5']['title']."'",
	"'".$_SESSION['custom']['step3']['dur_id']."'",
	"'".$_SESSION['custom']['step5']['room_id']."'",
	"'".$_SESSION['custom']['step5']['trans_id']."'",
	"'".$_SESSION['custom']['step5']['datetime']."'",
	"'".$_SESSION['custom']['step5']['address']."'",
	"'".$_SESSION['custom']['step5']['ktp']."'",
	"'".$_SESSION['user_id']."'",
	"'$url'",
	"'0'",
);
thisarray($_SESSION['custom']);
insert("custom_packages",$fields,$values);
rename("../../assets/img/temp/".$_SESSION['custom']['step5']['ktp'], "../../assets/img/attachment/".$_SESSION['custom']['step5']['ktp']);
$getId = get("select custom_id from custom_packages order by custom_id desc limit 1");
$fields2 = ["custom_id","start","end","title","description","destination_id","day"];
foreach ($_SESSION['custom']['step4'] as $i => $v) {
	$start = substr($v['time'], 0,5);
	$end = substr($v['time'], 8,5);
	$values2 = array(
		"'".$getId[0]['custom_id']."'",
		"'".$start."'",
		"'".$end."'",
		"'".$v['title']."'",
		"'".$v['desc']."'",
		"'".$v['dest_id']."'",
		"'".$v['day']."'",
	);
insert("custom_packages_itinerary",$fields2,$values2);
}
unset($_SESSION['custom']);
header("location:../../user/custom-tour?msg=Custom Tour Successfully Created");
?>