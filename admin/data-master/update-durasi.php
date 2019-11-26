<?php
include "../../config/model.php";
$tb = "durations";
$where = "where duration_id = '$_POST[duration_id]'";
$update = ["duration_time = '$_POST[duration_time]' "];
  update($tb,$update,$where);
  header("location:view-durasi");
 ?>
