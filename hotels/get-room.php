<?php 
	include "../config/model.php";
	$sql = get("select room_type, room_hotel_id from room_hotel where hotel_id = '".$_POST['hotel_id']."' ");
	echo "<option value=''>---Select---</option>";
	foreach ($sql as $data) {
		echo "<option value='".$data['room_hotel_id']."'>".$data['room_type']." Room</option>";
	}
?>