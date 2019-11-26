<?php 
session_start();
include "../config/model.php";
$getNotif = get("select count(notif_id) ttl from notif_user where user_id = '".$_POST['user_id']."' and view = '0' ");
if($getNotif[0]['ttl']>0){
	echo "<span class='badge' style='background: red;transform: translateY(-15%);'>".$getNotif[0]['ttl']."</span>";
 } 
?>