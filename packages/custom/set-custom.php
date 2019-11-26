<?php 
session_start();
include "../../config/model.php";
include "../../config/function.php";
if($_POST['step']==1){
	if(empty($_POST['city_id'])){
		$json['error'] = "Pilih Kota Tujuan";
	}else{
		$json['error'] = "";
		$_SESSION['custom']['step1']['city_id'] = $_POST['city_id'];
	}
}
else if($_POST['step']==2){
	if(empty($_POST['dest_id'])){
		$json['error'] = "Pilih Destinasi Wisata Tujuan";
	}else{
		$json['error'] = "";
		$dest_id = implode(",", $_POST['dest_id']);
		$_SESSION['custom']['step2']['dest_id'] = $dest_id;
	}
}
else if($_POST['step']==3){
	if(empty($_POST['dur_id'])){
		$json['error'] = "Pilih Durasi Trip Anda";
	}else{
		$json['error'] = "";
		$_SESSION['custom']['step3']['dur_id'] = $_POST['dur_id'];
	}
}
else if($_POST['step']==4){
	foreach ($_POST['input'] as $key => $value) {
		$_SESSION['custom']['step4'][$key] = $value;
	}
	$json['error'] = "";
}
else if($_POST['step']==5){
	$_SESSION['custom']['step5']['title'] = $_POST['title'];
	$_SESSION['custom']['step5']['room_id'] = $_POST['room_id'];
	$_SESSION['custom']['step5']['trans_id'] = $_POST['trans_id'];
	$date = date("Y-m-d",strtotime($_POST['date']));
	$_SESSION['custom']['step5']['datetime'] = $date." ".$_POST['time'];
	$_SESSION['custom']['step5']['address'] = $_POST['address'];
	$_SESSION['custom']['step5']['ktp'] = $_FILES['ktp']['name'];
	move_uploaded_file($_FILES['ktp']['tmp_name'], "../../assets/img/temp/".$_FILES['ktp']['name']);
	$json['redirect'] = base_url()."packages/custom/save-custom.php";
	$json['error'] = "";
}
header("content-type:json/application");
echo json_encode($json);
?>