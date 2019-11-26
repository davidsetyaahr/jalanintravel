<?php
	include "../config/model.php";
	if(empty($_FILES['file'])){
		$json['errorfile'] = "File Harap Diupload";
	}
	else{
		$arrImg = [];
		foreach ($_FILES['file']['name'] as $i => $v) {
			if($_FILES['file']['name'][$i]!=""){
				array_push($arrImg,$i);
			}
		}
		$err = 0;
		if(count($arrImg)==0){
			$json['errorfile'] = "Foto Harus Diisi";
		}
		else{
			$json['errorfile'] = "";
			foreach ($arrImg as $key => $value) {
				$type = array("jpg","png","gif","jpeg","JPG","PNG","GIF","JPEG");
				$extension = pathinfo($_FILES['file']['name'][$key]);

				if(!in_array($extension['extension'], $type)){
					$err++;
					$json['error_file_ex'][$key] = "Perhatikan Extensi File";
				}
				else{
					$json['error_file_ex'][$key] = "";
				}
			}
		}
	}
	if($json['errorfile']=="" && $err==0){
		$json['error'] = "";
		$json['kode'] = $_POST['kode_booking_package'];
		$insertImg = "";
		foreach ($arrImg as $k => $v) {
			$name = mt_rand()."-".$_FILES['file']['name'][$v];
			$glue = ($k==(count($arrImg)-1)) ? "" : ",";
			$insertImg .= $name.$glue;
			move_uploaded_file($_FILES['file']['tmp_name'][$v], "../assets/img/attachment/$name");
		}
		mysqli_query($GLOBALS['con'],"update booking_package set attachment = '$insertImg' where kode_booking_package = '$_POST[kode_booking_package]' ");
		insert("notif_admin",["kode_booking_package","status","view"],["'".$_POST['kode_booking_package']."'","'99'","'0'"]);
	}
	else{
		$json['error'] = "yes";
	}
	header("content-type:json/application");
	echo json_encode($json);
?>