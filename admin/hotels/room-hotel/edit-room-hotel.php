<?php 
	include "../../common/top.php";
	$panel['icon'] = "lnr lnr-store";
	$panel['title'] = "Room Hotel";
	$panel['subtitle'] = "Room Hotel / Edit Room Hotel";
	$title = "Room Hotel | Edit Room Hotel";
	$panel['btn'] = btn_admin("view-room-hotel","Lihat Data", "view");
	include "../../common/panel.php";
	$edit = get("select * from room_hotel where room_hotel_id = '".$_GET['id_room_hotel']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-room-hotel" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Tipe Room</label>
						<input type="hidden" name="room_hotel_id" class="form-control" value="<?php echo $edit[0]['room_hotel_id'] ?>">
						<select class="form-control" name="room_type">
							<option>---Select---</option>
							<option <?php echo ($edit[0]['room_type']=="Duluxe") ? "selected" : "" ?>>Duluxe</option>
							<option <?php echo ($edit[0]['room_type']=="Family") ? "selected" : "" ?>>Family</option>
							<option <?php echo ($edit[0]['room_type']=="Superior") ? "selected" : "" ?>>Superior</option>
						</select>
					</div>
						<div class="col-md-6">
						<label>Hotel</label>
						<select class="form-control" name="hotel_id">
						<option>---Select---</option>
							<?php 
							$sql = get("select hotel_id,hotel_name from hotels");
							foreach ($sql as $data) {
								$sel = ($data['hotel_id']==$edit[0]['hotel_id']) ? "selected" : "";
								echo "<option value='$data[hotel_id]' $sel>$data[hotel_name]</option>";
							}
							 ?>
					</select>
						</div>
				</div>
				<br>
				<div class="row">
						<div class="col-md-6">
							<label>Deskripsi Room</label>
							<textarea name="room_description" class="form-control"><?php echo $edit[0]['room_description'] ?></textarea>
						</div>
						<div class="col-md-6">
							<label>Foto</label>
							<input type="file" name="img" class="form-control">
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-6">
							<img src="<?php echo base_url()."assets/img/room-hotels/".$edit[0]['img'] ?>" class="img-responsive">
						</div>
						<div class="col-md-6">
							<br>
							<br>
							<?php 
							btn_add();
							 ?>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
<?php 
	include "../../common/slash-panel.php";
	include "../../common/bottom.php";
?>