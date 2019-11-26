<?php
	include "../config/model.php";
	include "../config/function.php";
	if($_POST['tipe']=="hotel"){
		if($_POST['hotel_id']==""){
			echo base_url()."assets/img/common/img.png";
		}
		else{
			$hotel = get("select photo from hotels where hotel_id = '$_POST[hotel_id]' ");
			echo base_url()."assets/img/hotels/".$hotel[0]['photo'];
		}
	}
	else if($_POST['tipe']=="room"){
		if($_POST['room_hotel_id']==""){
			echo base_url()."assets/img/common/img.png";
		}
		else{
			$room = get("select img from room_hotel where room_hotel_id = '$_POST[room_hotel_id]' ");
			echo base_url()."assets/img/hotels/rooms/".$room[0]['img'];
		}
	}

?>