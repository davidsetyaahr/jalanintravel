<?php
	include "../../config/model.php";
	include "../../config/function.php";

	if (move_uploaded_file($_FILES['icon']['tmp_name'],"../../assets/img/tour-style/".$_FILES['icon']['name'])) {
		$tb = "tour_style";
		$fields = ['tour_style_name', 'icon'];
		$values = ["'$_POST[tour_style]'","'".$_FILES['icon']['name']."'"];
		insert($tb,$fields,$values);
		header("location:view-tour-style");
	} else {
		echo "File was not uploaded";
	}
?>
