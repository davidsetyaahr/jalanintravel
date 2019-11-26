<?php
session_start();
	include "../../config/model.php";
	if($_POST['step']==1){
		if(trim($_POST['package_name'])==""){
			$json['error'][0] = ["#errname","Nama Paket Harus Diisi"];
		}
		else{
			$json['error'][0] = ["#errname",""];
		}

		if(trim($_POST['duration_id'])==""){
			$json['error'][1] = ["#errdur","Durasi Paket Harus Diisi"];
		}
		else{
			$dur = get("select count(duration_id) ttl from durations where duration_id = '".$_POST['duration_id']."'");
			if($dur[0]['ttl']==0){
				$json['error'][1] = ["#errdur","Durasi Tidak Sesuai"];		
			}
			else{				
				$json['error'][1] = ["#errdur",""];		
			}
		}
		if(empty($_POST['category_id'])){
			$json['error'][2] = ["#errcat","Kategori Harap Diisi"];
		}
		else{
			$errCat = "";
			for($i=0;$i<count($_POST['category_id']);$i++){
				$cekCat = get("select count(category_id) ttl from categories where category_id = '".$_POST['category_id'][$i]."'");
				if($cekCat[0]['ttl']==0){
					$errCat = "yes";
				}
			}
			if($errCat==""){
				$json['error'][2] = ["#errcat",""];
				$catId = implode(",", $_POST['category_id']);
			}
			else{
				$json['error'][2] = ["#errcat","Kategori Harap Diisi"];
			}
		}

		if(empty($_POST['tour_style_id'])){
			$json['error'][3] = ["#errts","Tour Style Harap Diisi"];
		}
		else{
			$errTs = "";
			for($i=0;$i<count($_POST['tour_style_id']);$i++){
				$cekTs = get("select count(tour_style_id) ttl from tour_style where tour_style_id = '".$_POST['tour_style_id'][$i]."'");
				if($cekTs[0]['ttl']==0){
					$errTs = "yes";
				}
			}
			if($errTs==""){
				$json['error'][3] = ["#errts",""];
				$tsId = implode(",", $_POST['tour_style_id']);
			}
			else{
				$json['error'][3] = ["#errts","Tour Style Harap Diisi"];
			}
		}
		if(trim($_POST['min_pax'])==""){
			$json['error'][4] = ["#errmin","Min Pax Harap Diisi"];
		}
		else{
			if(!is_numeric($_POST['min_pax']) || $_POST['min_pax']<=0){
				$json['error'][4] = ["#errmin","Min Pax Tidak Sesuai"];
			}
			else{
				$json['error'][4] = ["#errmin",""];
			}
		}
		if(trim($_POST['max_pax'])==""){
			$json['error'][5] = ["#errmax","Max Pax Harap Diisi"];
		}
		else{
			if(!is_numeric($_POST['max_pax']) || $_POST['max_pax']<$_POST['min_pax']){
				$json['error'][5] = ["#errmax","Max Pax Tidak Sesuai"];
			}
			else{
				$json['error'][5] = ["#errmax",""];
			}
		}
		if($_FILES['foto']['name']==""){
			if(isset($_SESSION['package']['step1']['photoname'])){
				$json['error'][6] = ["#errfoto",""];
			}
			else{
				$json['error'][6] = ["#errfoto","Foto Harap Diisi"];
			}
		}
		else{
		    $type = array("jpg","png","gif","jpeg","JPG","PNG","GIF","JPEG");
			$info = pathinfo($_FILES['foto']['name']);
			if(!in_array($info['extension'], $type)){
				$json['error'][6] = ["#errfoto","Perhatikan Extensi Foto"];
			}
			else{
				$json['error'][6] = ["#errfoto",""];
			}
		}
		if(empty($_POST['room_hotel_id']) || trim($_POST['room_hotel_id'])==""){
			$json['error'][7] = ["#errroom","Tipe Kamar Harus Diisi"];
		}
		else{
			$room = get("select count(room_hotel_id) ttl from room_hotel where room_hotel_id = '".$_POST['room_hotel_id']."'");
			if($room[0]['ttl']==0){
				$json['error'][7] = ["#errroom","Tipe Kamar Tidak Sesuai"];		
			}
			else{				
				$json['error'][7] = ["#errroom",""];
			}
		}
		if(trim($_POST['overview'])==""){
			$json['error'][8] = ["#erroroverview","Overview Harap Diisi"];
		}
		else{
			$json['error'][8] = ["#erroroverview",""];
		}
		if($json['error'][0][1]=="" && $json['error'][1][1]=="" && $json['error'][2][1]=="" && $json['error'][3][1]=="" && $json['error'][4][1]=="" && $json['error'][5][1]=="" && $json['error'][6][1]=="" && $json['error'][7][1]=="" && $json['error'][8][1]==""){
			$json['json_error'] = "no";
			$_SESSION['package']['step1']['package_name'] = $_POST['package_name'];
			$_SESSION['package']['step1']['duration_id'] = $_POST['duration_id'];
			$_SESSION['package']['step1']['category_id'] = $catId;
			$_SESSION['package']['step1']['tour_style_id'] = $tsId;
			$_SESSION['package']['step1']['min_pax'] = $_POST['min_pax'];
			$_SESSION['package']['step1']['max_pax'] = $_POST['max_pax'];
			$_SESSION['package']['step1']['room_id'] = $_POST['room_hotel_id'];
			$_SESSION['package']['step1']['overview'] = $_POST['overview'];
			if($_FILES['foto']['name']!=""){
				if(isset($_SESSION['package']['step1']['photoname'])){
					//unlink
				}
				$photoName = mt_rand()."-".$_FILES['foto']['name'];
				$_SESSION['package']['step1']['photoname'] = $photoName;
				move_uploaded_file($_FILES['foto']['tmp_name'], "../../assets/img/temp/".$photoName);
			}
		}
		else{
			$json['json_error'] = "yes";
		}
	}
	else if($_POST['step']==2){

		if(empty($_POST['destination_id'])){
			$json['error'] = "Pilih Destinasi Wisata";
		}
		else{
			$json['error'] = "";
			
			if(isset($_SESSION['package']['step2'])){
				if(isset($_SESSION['package']['step2']['edit'])){
					unset($_SESSION['package']['step2']['edit']);
				}
				$destOld = explode(",",$_SESSION['package']['step2']['destination_id']);
				$destNow = $_POST['destination_id'];
				if(count($destOld) == count($destNow)){
					$match = 0;
					foreach ($destNow as $index => $val) {
						if(in_array($val, $destOld)){
							$match++;
						}
					}
					if($match!=count($destOld)){
						$_SESSION['package']['step2']['edit'] = true;
						unset($_SESSION['package']['step3']);
					}
				}
				else{
					$_SESSION['package']['step2']['edit'] = true;
					unset($_SESSION['package']['step3']);
				}
				unset($_SESSION['package']['step2']['destination_id']);
			}
			$_SESSION['package']['step2']['destination_id'] = implode(",", $_POST['destination_id']);
		}
	}
	else if($_POST['step']==3){
//		$ttlDay = 0;
//		$arrDay = [];
		$errDestttl = 0;
		$errTitlettl = 0;		
		$errCatttl = 0;
		$errStartttl = 0;
		$errEndttl = 0;
		$errDescttl = 0;
		$errTsttl = 0;
		$postDest = $_POST['destination_id'];
		foreach($postDest as $i => $postDest){
			foreach($postDest as $x => $pDest){
				if($_POST['destination_id'][$i][$x]==""){
					$json['error_dest'][$i][$x] = "Tidak Boleh Kosong";
					$errDestttl++;
				}
				else{
//					$ttlDay = $ttlDay + $_POST['day'][$i][$x];
//					array_push($arrDay, $_POST['day'][$i][$x]);
					$json['error_dest'][$i][$x] = "";
				}
				if($_POST['title'][$i][$x]==""){
					$json['error_title'][$i][$x] = "Judul Trip Tidak Boleh Kosong";
					$errTitlettl++;
				}
				else{
					$json['error_title'][$i][$x] = "";
				}

				if($_POST['category_id'][$i][$x]==""){
					$json['error_category'][$i][$x] = "Kategori Tidak Boleh Kosong";
					$errCatttl++;
				}
				else{
					$json['error_category'][$i][$x] = "";
				}
				
				if($_POST['start'][$i][$x]==""){
					$json['error_start'][$i][$x] = "Waktu Dimulai Tidak Boleh Kosong";
					$errStartttl++;
				}
				else{
					$json['error_start'][$i][$x] = "";
				}

				if($_POST['end'][$i][$x]==""){
					$json['error_end'][$i][$x] = "Waktu Berakhir Tidak Boleh Kosong";
					$errEndttl++;
				}
				else{
					if(strtotime($_POST['end'][$i][$x]) <= strtotime($_POST['start'][$i][$x])){
						$json['error_end'][$i][$x] = "Perhatikan Waktu Berakhir";
						$errEndttl++;
					}
					else{
						$json['error_end'][$i][$x] = "";
					}
				}
				if($_POST['description'][$i][$x]==""){
					$json['error_desc'][$i][$x] = "Deskripsi Tidak Boleh Kosong";
					$errDescttl++;
				}
				else{
					$json['error_desc'][$i][$x] = "";
				}
			}
			foreach($_POST['destination_id'][$i] as $z => $ts){
				if(empty($_POST['tour_style_id'][$i][$z])){
					$json['error_ts'][$i][$z] = "Tour Style Tidak Boleh Kosong";
					$errTsttl++;
				}
				else{
					$json['error_ts'][$i][$z] = "";
				}
			}
		}
		if($errDestttl==0 && $errTitlettl==0 && $errCatttl==0 && $errStartttl==0 && $errEndttl==0 && $errDescttl==0 && $errTsttl==0){
			$json['error'] = "no";
			$postDest = $_POST['destination_id'];
			if(isset($_SESSION['package']['step2']['edit'])){
				unset($_SESSION['package']['step2']['edit']);
				unset($_SESSION['package']['step3']);
			}
			foreach($postDest as $i => $postDest){
				foreach($postDest as $x => $pDest){
					$_SESSION['package']['step3']['destination_id'][$i][$x] = $_POST['destination_id'][$i][$x];
					$_SESSION['package']['step3']['day'][$i][$x] = $_POST['day'][$i];
					$_SESSION['package']['step3']['title'][$i][$x] = $_POST['title'][$i][$x];
					$_SESSION['package']['step3']['category_id'][$i][$x] = $_POST['category_id'][$i][$x];
					$_SESSION['package']['step3']['start'][$i][$x] = $_POST['start'][$i][$x];
					$_SESSION['package']['step3']['end'][$i][$x] = $_POST['end'][$i][$x];
					$_SESSION['package']['step3']['description'][$i][$x] = $_POST['description'][$i][$x];
				}
			}
			foreach ($_POST['tour_style_id'] as $key => $value){
				foreach ($_POST['tour_style_id'][$key] as $index => $val){
					$im = implode(",", $val);
					$_SESSION['package']['step3']['tour_style_id'][$key][$index] = $im;
				}
			}
		}	
		else{
				$json['error'] = "yes";
		}	
	}
	else if($_POST['step']==4){
		if(empty($_POST['office_id'])){
			$json['error_count'] = "Pilih Opsi Keberangkatan";
		}
		else{
			$json['error_count'] = "";
			$errAcc = 0;
			$errDep = 0;
			$errDay = 0;
			foreach ($_POST['accommodation_id'] as $key => $ac) {
				if($_POST['accommodation_id'][$key]==""){
					$json['error_accommodation'][$key] = "Tidak Boleh Kosong";
					$errAcc++;
				}
				else{
					$json['error_accommodation'][$key] = "";
				}
				if($_POST['departure_time'][$key]==""){
					$json['error_departure'][$key] = "Tidak Boleh Kosong";
					$errDep++;
				}
				else{
					$json['error_departure'][$key] = "";
				}

				if($_POST['departure_day'][$key]==""){
					$json['error_departure_day'][$key] = "Tidak Boleh Kosong";
					$errDay++;
				}
				else{
					$json['error_departure_day'][$key] = "";
				}
			}
			if($errAcc==0 && $errDep==0 && $errDay==0){
				$json['error'] = "no";
				if(isset($_SESSION['package']['step4'])){
				$offOld = $_SESSION['package']['step4']['office_id'];
				$offNow = $_POST['office_id'];
				if(count($offOld) == count($offNow)){
					$match = 0;
					foreach ($offNow as $index => $val) {
						if(in_array($val, $offOld)){
							$match++;
						}
					}
					if($match!=count($offOld)){
						$_SESSION['package']['step4']['edit'] = true;
						unset($_SESSION['package']['step5']);
					}
				}
				else{
					$_SESSION['package']['step4']['edit'] = true;
					unset($_SESSION['package']['step5']);
				}
				unset($_SESSION['package']['step4']);

				}
				foreach ($_POST['accommodation_id'] as $key => $ac) {
					$_SESSION['package']['step4']['office_id'][$key] = $_POST['office_id'][$key];
					$_SESSION['package']['step4']['accommodation_id'][$key] = $ac;
					$_SESSION['package']['step4']['departure_time'][$key] = $_POST['departure_time'][$key];
					$_SESSION['package']['step4']['departure_day'][$key] = $_POST['departure_day'][$key];
				}
			}
			else{
				$json['error'] = "yes";
			}
		}
	}
	else if($_POST['step']==5){
		/*
		print_r($_POST);
		*/
		$err = 0;
		foreach ($_POST['price'] as $key => $value){
			foreach ($_POST['price'][$key] as $k => $v){
				if($v=="" || $v==0){
					$json['error_price'][$key][$k] = "Tidak Boleh Kosong";
					$err++;
				}
				else{
					if(!is_numeric($v)){
						$err++;
						$json['error_price'][$key][$k] = "Masukkan Dengan Benar";
					}
					else{
						$json['error_price'][$key][$k] = "";
					}
				}
			}
		}
		if($err==0){
			if(isset($_SESSION['package']['step4']['edit'])){
				unset($_SESSION['package']['step4']['edit']);
				unset($_SESSION['package']['step5']);
			}
			foreach ($_POST['price'] as $key => $value){
				foreach ($_POST['price'][$key] as $k => $v){
					$_SESSION['package']['step5']['pax_category_id'][$key][$k] = $_POST['pax_category_id'][$key][$k];
					$_SESSION['package']['step5']['price'][$key][$k] = $v;
					$json['error'] = "no";
				}
			}
		}
		else{
			$json['error'] = "yes";
		}
	}
	else if($_POST['step']==6){
		if(!is_numeric($_POST['sale'])){
			$json['error'] = "Masukkan Diskon Yang Sesuai";
		}
		else{
			if($_POST['sale']<0){
				$json['error'] = "Masukkan Diskon Yang Sesuai";
			}
			else{
				$_SESSION['package']['step6']['sale'] = ($_POST['sale']=="") ? 0 : $_POST['sale'];
				$json['error'] = "";
			}
		}
	}
	header("content-type:json/application");
	echo json_encode($json);
?>