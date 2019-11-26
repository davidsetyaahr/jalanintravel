<?php 
session_start();
include "../config/model.php";
	if(isset($_POST['step'])){
		if($_POST['step']==2){
			if(isset($_POST['pax']) && isset($_POST['start_tour']) && isset($_POST['package_id'])){
				$cek_id = get("select count(package_id) ttl from packages where package_id = '".$_POST['package_id']."' ");
				if($cek_id[0]['ttl']==1){
					$capacity = get("select min_pax,max_pax from packages where package_id = '".$_POST['package_id']."' ");
					$count_pax = count($_POST['pax']);
					$sum_pax = 0;
					for($i=0;$i<$count_pax;$i++){
						$id = $_POST['pax'][$i][0];
						$value = ($_POST['pax'][$i][1]==0) ? 0 : $_POST['pax'][$i][1];
						$sum_pax = $sum_pax + $value;
					}
					if($sum_pax < $capacity[0]['min_pax'] || $sum_pax > $capacity[0]['max_pax']){
						$json['error_sum_pax'] = "Jumlah PAX Tidak Sesuai";
					}
					else{
						$json['error_sum_pax'] = "";
					}

					if(trim($_POST['start_tour'])==""){
						$json['error_start_tour'] = "Start Tour Harap Diisi";
					}
					else{
						$json['error_start_tour'] = "";
					}
					if($json['error_sum_pax']=="" && $json['error_start_tour']==""){
						$_SESSION['booking']['package_id'] = $_POST['package_id'];
						for($x=0;$x<$count_pax;$x++){
							$id = $_POST['pax'][$x][0];
							$value = ($_POST['pax'][$x][1]==0) ? 0 : $_POST['pax'][$x][1];
							$_SESSION['booking']['pax'][$x] = [$id,$value];
						}
							$_SESSION['booking']['ttlpax'] = $sum_pax;

						$_SESSION['booking']['start_tour'] = $_POST['start_tour'];
						$_SESSION['booking']['end_tour'] = $_POST['end_tour'];
					}
					header("content-type:json/application");
					echo json_encode($json);
				}
			}
		}
		else if($_POST['step']==3){
			if(isset($_POST['price_id'])){
				$cekPrice = get("select count(price_id) ttl from packages_price where price_id = '".$_POST['price_id']."' ");
				if(trim($_POST['price_id']=="")){
					$json['error_price'] = "Pilih Daftar Harga";
				}
				else if($cekPrice[0]['ttl']==0){
					$json['error_price'] = "Pilih Harga Yang Sesuai";
				}
				else{
					$_SESSION['booking']['price_id'] = $_POST['price_id'];
					$json['error_price'] = "";
				}
			}
			else{
				$json['error_price'] = "Pilih Daftar Harga";
			}
				header("content-type:json/application");
				echo json_encode($json);
		}
		else if($_POST['step']==4){
			if(isset($_POST['alamat'])){
				if(trim($_POST['alamat'])==""){
					$json['erroralamat'] = "Alamat Harap Diisi";
				}
				else{
					$json['erroralamat'] = "";
				}
				if(empty($_FILES['file'])){
					$json['errorfile'] = "File Harap Diupload";
				}
				else{
					$err = 0;
					$json['errorfile'] = "";
					foreach ($_FILES['file']['name'] as $key => $value) {
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
				if($json['erroralamat']=="" && $json['errorfile']=="" && $err==0){
					$json['error'] = "";
					$_SESSION['booking']['alamat'] = $_POST['alamat'];
					foreach ($_FILES['file']['name'] as $k => $v) {
						$name = mt_rand()."-".$_FILES['file']['name'][$k];
						move_uploaded_file($_FILES['file']['tmp_name'][$k], "../assets/img/attachment/$name");
						$_SESSION['booking']['attachment'][$k] = $name;
					}
				}
				else{
					$json['error'] = "yes";
				}
				header("content-type:json/application");
				echo json_encode($json);
			}
		}
}
?>