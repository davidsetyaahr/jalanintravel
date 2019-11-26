<?php
	include "../../../config/model.php";
	include "../../../config/function.php";

	if (move_uploaded_file($_FILES['img']['tmp_name'],"../../../assets/img/room-hotels/".$_FILES['img']['name'])) {
		$tb = "room_hotel";
		$fields = ['room_type','hotel_id','room_description','img'];
		$values = ["'$_POST[room_type]'","'$_POST[hotel_id]'","'$_POST[room_description]'","'".$_FILES['img']['name']."'"];
		insert($tb,$fields,$values);
		header("location:view-room-hotel");
	} else {
	   echo "File was not uploaded";
	}	
?>