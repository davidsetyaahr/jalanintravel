<?php
include "../../config/model.php";
$notif = get("select * from notif_admin where view = '0' order by notif_id desc");
if(count($notif)>0){
	echo '<span class="badge bg-danger bell-notif" data-notif="'.count($notif).'">';
	echo count($notif);
	echo '</span>';
}
?>
