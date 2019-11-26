<?php 
	include "../../common/top.php";
	$panel['icon'] = "lnr lnr-store";
	$panel['title'] = "Hotel";
	$panel['subtitle'] = "Hotel / Daftar Hotel";
	$panel['btn'] = btn_admin("view-room-hotel", "Lihat Data", "view");
	$title = "room-hotel | list-room-hotel";

	include "../../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form action="add-room-hotel.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Tipe Room</label>
						<select class="form-control" name="room_type">
							<option>---select---</option>
							<option>Duluxe</option>
							<option>Family</option>
							<option>Superior</option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Hotel</label>
						<select class="form-control" name="hotel_id">
						<option>---select---</option>
							<?php 
							$sql = get("select hotel_id,hotel_name from hotels");
							foreach ($sql as $data) {
								echo "<option value='$data[hotel_id]'>$data[hotel_name]</option>";
							}
							 ?>
					</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<br>
						<label>Deskripsi</label>
						<input type="text" name="room_description" class="form-control">
					</div>
					<div class="col-md-6">
						<br>
						<label>Foto</label>
						<input type="file" name="img" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6"><br>
						<?php echo btn_add() ?>
					</div>
				</div>

			</form>
	</div>
</div>
<?php 
	include "../../common/slash-panel.php";
	include "../../common/bottom.php";
?>