<?php 
	include "../../config/model.php";
	$sql = get("select city_name, city_id from city where province_id = '".$_POST['province_id']."' ");
	foreach ($sql as $data) {
		echo "<option value='".$data['city_id']."'>".$data['city_name']."</option>";
	}
?>