<?php 
include "../../config/model.php";
$tb = "city";
$fields = ['province_id','city_name'];
$values = ["'$_POST[province_id]'","'$_POST[city_name]'"];
insert($tb,$fields,$values);
header("location:view-kota.php");
 ?>