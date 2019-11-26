<?php
	include "../../config/model.php";
	if(trim($_POST['destination_name'])==""){
		$json['error_destination_name'] = "Nama Destinasi Harap Diisi";
	}
	else{
		$json['error_destination_name'] = "";
	}

	if(trim($_POST['city_id'])==""){
		$json['error_city'] = "Kota Harap Diisi";
	}
	else{
		$cekCity = get("select count(city_id) ttl from city where city_id = '".$_POST['city_id']."' ");
		if($cekCity[0]['ttl']==0){
			$json['error_city'] = "Kota Harap Diisi";
		}
		else{
			if($json['error_destination_name']==""){
				$cekName = get("select count(destination_id) ttl from destinations where destination_name = '".special_chars($_POST['destination_name'])."' and city_id = '".$_POST['city_id']."' ");
				if($cekName[0]['ttl']>0){
					$json['error_destination_name'] = "Destinasi Telah Tersedia";
				}
				else{
					$json['error_destination_name'] = "";
				}
			}
			$json['error_city'] = "";
		}
	}

	if(trim($_POST['category_id'])==""){
		$json['error_category'] = "Kategory Harap Diisi";
	}
	else{
		$cekCat = get("select count(category_id) ttl from categories where category_id = '".$_POST['category_id']."' ");
		if($cekCat[0]['ttl']==0){
			$json['error_category'] = "Kategory Harap Diisi";
		}
		else{
			$json['error_category'] = "";
		}
	}

	if(empty($_POST['tour_style_id'])){
		$json['error_tour_style'] = "Tour Style Harap Diisi";
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
			$json['error_tour_style'] = "";
			$tsId = implode(",", $_POST['tour_style_id']);
		}
		else{
			$json['error_tour_style'] = "Tour Style Harap Diisi";
		}
	}
	if(trim($_POST['overview'])==""){
		$json['error_overview'] = "Overview Harap Diisi";
	}
	else{
		$json['error_overview'] = "";
	}
	$arrImg = [];
	for($x=0;$x<count($_FILES['img']['name']);$x++){
		if($_FILES['img']['name'][$x]!=""){
			array_push($arrImg,$x);
		}
	}
	if(count($arrImg)==0){
		$json['error_img'] = "Foto Harus Diisi";
	}
	else{
		$error_loop_img = 0;
		$json['error_img'] = "";
		for($z=0;$z<count($arrImg);$z++){
			$now = $arrImg[$z];
	    	$type = array("jpg","png","gif","jpeg","JPG","PNG","GIF","JPEG");
			$info = pathinfo($_FILES['img']['name'][$now]);

			if(!in_array($info['extension'], $type)){
				$json['error_loop_img'][$z] = [$now,"Perhatikan Extensi File Anda"];
				$error_loop_img++;
			}
			else{
				$json['error_loop_img'][$z] = [$now,""];
			}
		}
	}

	if(trim($_POST['information'])==""){
		$json['error_info'] = "Informasi Harap Diisi";
	}
	else{
		$json['error_info'] = "";
	}
	if($json['error_destination_name']=="" && $json['error_city']=="" && $json['error_category']=="" && $json['error_tour_style']=="" && $json['error_overview']=="" && $json['error_img']=="" && $json['error_info']==""){
		if($error_loop_img==0){
			$arrName = [];
			$img_name = "";
			for($x=0;$x<count($arrImg);$x++){
				$now = $arrImg[$x];
				$name = mt_rand()."-".$_FILES['img']['name'][$now];
				if(move_uploaded_file($_FILES['img']['tmp_name'][$now], "../../assets/img/destinations/$name")){
					$glue = ($x==(count($arrImg)-1)) ? "" : ",";
					$img_name .= $name.$glue;
				}
			}
			$json['img_name'] = $img_name;
			if(strlen($json['img_name'])>0){
				$url = str_replace(" ", "-", $_POST['destination_name']);
				/*
				$cekUrl = get("select count(destination_id) ttl from destinations where url = '".$url."'");
				if($cekUrl[0]['ttl']>0){
					$json['permalink'] = $url."-".str_replace(" ", "-", $_POST['city']);
				}
				else{
					$json['permalink'] = $url;
				}
				*/
				$json['permalink'] = $url;

				$tb = "destinations";
				$fields = ["destination_name","city_id","category_id","tour_styles_id","overview","img","information","map","url"];
				$values = array(
					"'".special_chars($_POST['destination_name'])."'",
					"'".$_POST['city_id']."'",
					"'".$_POST['category_id']."'",
					"'".$tsId."'",
					"'".special_chars($_POST['overview'])."'",
					"'".$json['img_name']."'",
					"'".special_chars($_POST['information'])."'",
					"'".special_chars($_POST['map'])."'",
					"'".strtolower(str_replace("'", "", $json['permalink']))."'"
				);
				insert($tb,$fields,$values);
				$json['error'] = "no";
			}
		}
		else{
			$json['error'] = "yes";
		}
	}
	else{
		$json['error'] = "yes";
	}
	header("content-type:json/application");
	echo json_encode($json);
?>