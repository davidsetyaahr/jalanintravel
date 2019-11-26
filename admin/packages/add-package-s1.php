<?php 
	$step1 = isset($_SESSION['package']['step1']) ? true : false;
	$sess = ($step1==true) ? $_SESSION['package']['step1'] : "";
?>
<?php 
	if(isset($_GET['msg'])){
		echo "<div class='col-md-12'><div class='alert alert-success'><b>Paket Tour Berhasil Ditambahkan</b></div></div>";
	}
?>
<div class="col-md-6">
	<label>Nama Paket Wisata <small id="errname" class="error"></small></label>
	<input type="text" class="form-control" name="package_name" value="<?php echo isset($_SESSION['package']['step1']['package_name']) ? $_SESSION['package']['step1']['package_name'] : "" ?>">
</div>
<div class="col-md-6">
	<label>Durasi Wisata <small id="errdur" class="error"></small></label>
	<select class="form-control" name="duration_id">
		<option value="">---Select---</option>
		<?php
			$dur = get("select * from durations order by duration_time asc");
			foreach ($dur as $dur) {
				$sel = "";
				if(isset($_SESSION['package']['step1']['duration_id'])){
					$sel = ($dur['duration_id']==$_SESSION['package']['step1']['duration_id']) ? "selected" : "";
				}
				echo "<option value='".$dur['duration_time']."' $sel>".$dur['duration_time']." Hari</option>";
			}
		?>
	</select>
</div>
<div class="col-md-6">
	<br>
	<label>Kategori <small id="errcat" class="error"></small></label>
	<div class="form-control">
	<?php 
		$cat = get("select * from categories");
		$excat = ($step1==true) ? explode(",", $_SESSION['package']['step1']['category_id']) : "";
		foreach ($cat as $cat) {
			$arrCheck = [];
			$checked = "";
			if($step1==true){
				foreach ($excat as $value) {
					if($value==$cat['category_id']){
						array_push($arrCheck, $cat['category_id']);
					}
				}
				$checked = "";
				foreach ($arrCheck as $check) {
					$checked = ($check==$cat['category_id']) ? "checked" : "";
				}
			}
	?>
		<label class="fancy-checkbox" style="display: inline-block;">
			<input type="checkbox" name="category_id[]" value="<?php echo $cat['category_id'] ?>" <?php echo $checked ?>>
			<span><?php echo $cat['category_name'] ?></span>					
		</label>
		&nbsp;
	<?php
		}
	?>
	</div>
</div>
<div class="col-md-6">
<br>
	<label>Tour Styles <small id="errts" class="error"></small></label>
	<div class="form-control">
	<?php 
		$exts = ($step1==true) ? explode(",", $_SESSION['package']['step1']['tour_style_id']) : "";
		$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style order by tsid desc");
		foreach ($ts as $ts) {
			$arrCheck = [];
			if($step1==true){
				foreach ($exts as $value) {
					if($value==$ts['tsid']){
						array_push($arrCheck, $ts['tsid']);
					}
				}
				$checked = "";
				foreach ($arrCheck as $check) {
					$checked = ($check==$ts['tsid']) ? "checked" : "";
				}
			}
		?>
			<label class="fancy-checkbox" style="display: inline-block;">
				<input type="checkbox" name="tour_style_id[]" value="<?php echo $ts['tsid'] ?>"  <?php echo $checked; ?>>
				<span><?php echo $ts['tsname'] ?></span>					
			</label>
			&nbsp;
	<?php } ?>
	</div>
</div>
<div class="col-md-6">
	<br>
	<label>Min Pax <small id="errmin" class="error"></small></label>
	<input type="number" name="min_pax" class="form-control" value="<?php echo ($step1==true) ? $sess['min_pax'] : "" ?>">
</div>
<div class="col-md-6">
	<br>
	<label>Max Pax <small id="errmax" class="error"></small></label>
	<input type="number" name="max_pax" class="form-control" value="<?php echo ($step1==true) ? $sess['max_pax'] : "" ?>">
</div>
<div class="col-md-4">
	<br>
	<label>Foto <?php echo $step1==true ? "<small><a data-toggle='modal' data-target='#myModal' style='cursor:pointer' class='imgmodal' data-src='".base_url()."assets/img/temp/".$sess['photoname']."'>Lihat Foto</a></small>" : "";   ?>  <small id="errfoto" class="error"></small></label>
	<input type="file" class="form-control" name="foto">
</div>
<div class="col-md-4">
	<br>
	<label>Penginapan</label>
	<select class="form-control" id="hotels" name="hotels">
		<option value="">---Select---</option>
	<?php 
		if($step1==true){
			$getHotel = get("select hotel_id,room_type,room_hotel_id from room_hotel where room_hotel_id = '$sess[room_id]' ");
		}
		$hotels = get("select * from hotels");
			foreach ($hotels as $h) {
				$sel = "";
				if($step1==true){
					$sel = $getHotel[0]['hotel_id']==$h['hotel_id'] ? "selected" : "";
				}
				echo "<option value='".$h['hotel_id']."' $sel>".$h['hotel_name']."</option>";
			}
	?>
	</select>
</div>
<div class="col-md-4">
	<br>
	<label>Tipe Kamar <small id="errroom" class="error"></small></label>
		<select class="form-control" id="room-hotels" name="room_hotel_id" <?php echo $step1==true ? "readonly" : "disabled" ?>>
			<?php 
				if($step1==true){
					echo "<option value='".$getHotel[0]['room_hotel_id']."' selected>".$getHotel[0]['room_type']."</option>";
				}
				else{
					echo "<option value=''></option>";
				}
			?>
		</select>
</div>
<div class="col-md-12">
	<br>
	<label>Overview <small id="erroroverview" class="error"></small></label>
	<textarea class="form-control" name="overview" class="textarea"><?php echo ($step1==true) ? $sess['overview'] : "" ?></textarea>
</div>
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-md">

<!-- Modal content-->
<div class="modal-content">
	<div class="modal-header" style="background: #49d295;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h5 class="modal-title text-center" style="color: white"><b>Foto / Banner Untuk Paket Wisata</b></h5>
	</div>
	<div class="modal-body">
		<img src="" class="img-responsive img-rounded thumbnail">
	</div>
</div>
</div>
</div>