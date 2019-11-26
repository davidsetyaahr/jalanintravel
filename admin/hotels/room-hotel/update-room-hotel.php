<?php 
	include "../../../config/model.php";
	$tb = "room_hotel";
	$where = "where room_hotel_id = '$_POST[room_hotel_id]'";
	if(empty($_FILES['img']['name'])){
		$update = ["room_type = '$_POST[room_type]' ","hotel_id = '$_POST[hotel_id]'","room_description = '$_POST[room_description]'"];
		update($tb,$update,$where);
		header("location:view-room-hotel");
	}
	else{
		if (move_uploaded_file($_FILES['img']['tmp_name'],"../../../assets/img/room-hotels/".$_FILES['img']['name'])) {
			$update = ["room_type = '$_POST[room_type]' ","hotel_id = '$_POST[hotel_id]'","room_description = '$_POST[room_description]'","img = '".$_FILES['img']['name']."' "];
			update($tb,$update,$where);
			header("location:view-room-hotel");
		} else {
		   echo "File was not uploaded";
		}	
	}
?>