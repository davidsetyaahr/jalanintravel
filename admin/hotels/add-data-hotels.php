<?php
include "../../config/model.php";
if (move_uploaded_file($_FILES['photo']['tmp_name'],"../../assets/img/hotels/".$_FILES['photo']['name'])){

$tb = "hotels";
$fields = ['hotel_name','photo','star','address','descriptions'];
$values = ["'$_POST[hotel_name]'","'".$_FILES['photo']['name']."'","'$_POST[star]'","'$_POST[address]'","'$_POST[descriptions]'"];
insert ($tb,$fields,$values);
header ("location:view-data-hotels");
}else{
    echo "file was not uploaded";
}

 ?>
