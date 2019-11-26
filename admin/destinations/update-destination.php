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
				$cekName = get("select count(destination_id) ttl from destinations where destination_name = '".special_chars($_POST['destination_name'])."' and city_id = '".$_POST['city_id']."' and destination_id != '".$_POST['destination_id']."' ");
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
//		$json['error_img'] = "Foto Harus Diisi";
		$json['error_img'] = "";
		$json['img_loop'] = "no";
	}
	else{
		$json['img_loop'] = "yes";
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
		if(isset($error_loop_img)){
			if($error_loop_img==0){
				$arrName = [];
				$img_name = "";
				for($x=0;$x<count($arrImg);$x++){
					$now = $arrImg[$x];
					$name = mt_rand()."-".$_FILES['img']['name'][$now];
					if(move_uploaded_file($_FILES['img']['tmp_name'][$now], "../../assets/img/destinations/$name")){
						$img_name = $name;
						$arrName[] = [$now,$img_name];
					}
				}
				$json['img_name'] = $arrName;
				if(count($arrName)>0){
					$getImg = get("select img from destinations where destination_id = '".$_POST['destination_id']."'");
					$exImg = explode(",", $getImg[0]['img']);
					$json['img_db'] = $exImg;

					$updateImg = [];
					$addImg = [];
					$updateImgLoop = 0;
					for ($i=0;$i<count($json['img_db']) ; $i++) { 
						for($z=0;$z<count($json['img_name']);$z++){
							if($i==$json['img_name'][$z][0]){
								$updateImgLoop++;
							}
						}
					}
					if($updateImgLoop==0){
						$jImgName = [];
						for($x=0;$x<count($json['img_name']);$x++) {
							array_push($jImgName, $json['img_name'][$x][1]);
						}
						$im = implode(",", $jImgName);
						$toDB = $getImg[0]['img'].",".$im;
					}
					else{
						$updateImg = $json['img_db'];
						for($z=0;$z<count($json['img_name']);$z++){
							$updateImg[$json['img_name'][$z][0]] = $json['img_name'][$z][1];
						}
						$toDB = implode(",", $updateImg);
					}
					$json['update_img'] = $updateImg; 
					$json['add_img'] = $addImg; 
					$tb = "destinations";
					$values = array(
						"destination_name = '".special_chars($_POST['destination_name'])."'",
						"city_id = '".$_POST['city_id']."'",
						"category_id = '".$_POST['category_id']."'",
						"tour_styles_id = '".$tsId."'",
						"img = '".$toDB."'",
						"overview = '".special_chars($_POST['overview'])."'",
						"information = '".special_chars($_POST['information'])."'",
						"map = '".special_chars($_POST['map'])."'"
					);
					update($tb,$values,"where destination_id = '".$_POST['destination_id']."'");
					$json['error'] = "no";
				}
			}
			else{
				$json['error'] = "yes";
			}
		}
		else{
			$url = str_replace(" ", "-", $_POST['destination_name']);
			$json['permalink'] = $url;

			$tb = "destinations";
			$values = array(
				"destination_name = '".special_chars($_POST['destination_name'])."'",
				"city_id = '".$_POST['city_id']."'",
				"category_id = '".$_POST['category_id']."'",
				"tour_styles_id = '".$tsId."'",
				"overview = '".special_chars($_POST['overview'])."'",
				"information = '".special_chars($_POST['information'])."'",
				"map = '".special_chars($_POST['map'])."'"
			);
			update($tb,$values,"where destination_id = '".$_POST['destination_id']."'");
			$json['error'] = "no";
		}
	}
	else{
		$json['error'] = "yes";
	}

	header("content-type:json/application");
	echo json_encode($json);
?>