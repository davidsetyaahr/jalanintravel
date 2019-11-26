<?php 
  if(empty($_SESSION['package']['step2'])){
      echo "<script>window.location='add-package?step=2'</script>";
  }
if((isset($_SESSION['package']['step3']) && isset($_SESSION['package']['step2']['edit'])) || empty($_SESSION['package']['step3'])){
$dur = $_SESSION['package']['step1']['duration_id'];
$getDay = get("select duration_time from durations where duration_id = '$dur' ");
$day = 1;
for($i=0;$i<$dur;$i++){
?>
	<div class="col-md-12">
		<div class="row thumbnail">
		<br>
			<div class="col-md-12">
				<div class="alert alert-success">
					<b>
						Trip Hari Ke - <?php echo $day ?>
					</b>
				</div>					
			</div>
			<div class="col-md-12" id="loop0">
				<div class="row">
					<div class="col-md-4">
						<label>Destinasi Wisata <span class="error" id="dest<?php echo $i."-0" ?>"></span></label>
						<input type="hidden" class="form-control" value="<?php echo $day ?>" name="day[<?php echo $i ?>][0]">
						<select name="destination_id[<?php echo $i ?>][0]" class="form-control">
							<option value="">---Select---</option>
							<?php
								$arrDest = explode(",", $_SESSION['package']['step2']['destination_id']);
								$arrCat = [];
								for($x=0;$x<count($arrDest);$x++){
									$getDest = get("select c.category_id from destinations d join categories c on d.category_id = c.category_id where d.destination_id = '".$arrDest[$x]."'");
									array_push($arrCat, $getDest[0]['category_id']);
								}
								$arrC = array_unique($arrCat);
								for ($ii=0; $ii < count($arrC); $ii++) { 
									$getCat = get("select category_name from categories where category_id = '$arrC[$ii]' ");
									echo "<optgroup label='".$getCat[0]['category_name']."'>";
									for($x=0;$x<count($arrDest);$x++){
										$getDest = get("select destination_name, destination_id from destinations where destination_id = '".$arrDest[$x]."' and category_id = '".$arrC[$ii]."' ");
										foreach ($getDest as $key => $value) {
											echo "<option value='$value[destination_id]'>$value[destination_name]</option>";
										}
									}
									echo "</optgroup>";
								}
							?>
							<optgroup label="Lainnya">
								<option value="0">Lainnya</option>
							</optgroup>
						</select>
					</div>
					<div class="col-md-8">
						<label>Judul Trip <span class="error" id="title<?php echo $i."-0" ?>"></span></label>
						<input type="text" class="form-control" name="title[<?php echo $i ?>][0]">
					</div>
					<div class="col-md-6">
						<br>
						<label>Kategori <span class="error" id="cat<?php echo $i."-0" ?>"></span></label>
						<select class="form-control" name="category_id[<?php echo $i ?>][0]">
							<option value="">---Select---</option>
							<?php 
								$cat = get("select category_name,category_id from categories` order by category_name asc");
								foreach ($cat as $cat) {
									echo "<option value='$cat[category_id]'>$cat[category_name]</option>";
								}
							?>
						</select>
					<br>
					</div>
					<div class="col-md-6">
						<br>
						<label>Tour Styles <span class="error" id="ts<?php echo $i."-0" ?>"></span></label>
						<div class="form-control">
							<?php 
								$t = 0;
								$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style order by tsid desc");
								foreach ($ts as $ts) {
							?>
							<label class="fancy-checkbox" style="display: inline-block;">
								<input type="checkbox" name="tour_style_id[<?php echo $i ?>][0][]" value="<?php echo $ts['tsid'] ?>">
								<span><?php echo $ts['tsname'] ?></span>
							</label>
							&nbsp;
							<?php $t++; } ?>
						</div>
						<br>
					</div>
					<div class="col-md-6">
						<label>Waktu Mulai <span class="error" id="start<?php echo $i."-0" ?>"></span></label>
						<input type="text" name="start[<?php echo $i ?>][0]" class="time-picker form-control" placeholder="Klik Disini" style="background: " readonly>
						<br>
					</div>
					<div class="col-md-6">
						<label>Waktu Berakhir <span class="error" id="end<?php echo $i."-0" ?>"></span></label>
						<input type="text" name="end[<?php echo $i ?>][0]" class="time-picker form-control" placeholder="Klik Disini" style="background: " readonly>
						<br>
					</div>
					<div class="col-md-12">
						<label>Deskripsi Trip <span class="error" id="desc<?php echo $i."-0" ?>"></span></label>
						<textarea class="form-control" name="description[<?php echo $i ?>][0]"></textarea>
						<br>
					</div>
					
				</div>
			</div>
			<div id="place<?php echo $i; ?>">
			</div>
			<div class="col-md-12">
				<a href="" class="btn btn-primary add-trip" data-click="0" data-loop="<?php echo $i ?>" data-target="<?php echo "place$i" ?>"><span class="fa fa-plus-circle"></span> Perbanyak Trip</a>
				<br>
				<br>
			</div>
		</div>
	</div>
<?php
	$day++;
}
}
else{
	$n = 0;
	$arrDest = explode(",", $_SESSION['package']['step2']['destination_id']);
	$edit = isset($_SESSION['package']['step2']['edit']) ? true : false;
	$clicked = 0;
	foreach ($_SESSION['package']['step3']['day'] as $key => $value) {
		foreach ($_SESSION['package']['step3']['day'][$key] as $index => $val) {
			$clicked++;
		}
	}
	$click = $clicked - 1;
	$dur = $_SESSION['package']['step1']['duration_id'];
	$getDay = get("select duration_time from durations where duration_id = '$dur' ");
	$day = 1;

	for($i=0;$i<$dur;$i++){
?>
	<div class="col-md-12">
		<div class="row thumbnail">
		<br>
			<div class="col-md-12">
				<div class="alert alert-success">
					<b>
						Trip Hari Ke - <?php echo $day ?>
					</b>
				</div>					
			</div>
	<?php
//	thisarray($_SESSION['package']['step3']);
		foreach ($_SESSION['package']['step3']['destination_id'][$i] as $keyloop => $loop) {
			$exTs = explode(",",$_SESSION['package']['step3']['tour_style_id'][$i][$keyloop]);

	?>
			<div class="col-md-12" id="loop<?php echo $i."-".$keyloop ?>">
				<hr>
				<div class="row">
					<div class="col-md-4">
						<label>Destinasi Wisata <span class="error" id="dest<?php echo $i."-$keyloop" ?>"></span></label>
						<input type="hidden" class="form-control" value="<?php echo $day ?>" name="day<?php echo "[$i][$keyloop]" ?>">
						<select class="form-control" name="destination_id<?php echo "[$i][$keyloop]" ?>">
							<option value="">---Select---</option>
							<?php
								$arrDest = explode(",", $_SESSION['package']['step2']['destination_id']);
								$arrCat = [];
								for($x=0;$x<count($arrDest);$x++){
									$getDest = get("select c.category_id from destinations d join categories c on d.category_id = c.category_id where d.destination_id = '".$arrDest[$x]."'");
									array_push($arrCat, $getDest[0]['category_id']);
								}
								$arrC = array_unique($arrCat);
								for ($ii=0; $ii < count($arrC); $ii++) { 
									$getCat = get("select category_name from categories where category_id = '$arrC[$ii]' ");
									echo "<optgroup label='".$getCat[0]['category_name']."'>";
									for($x=0;$x<count($arrDest);$x++){
										$getDest = get("select destination_name, destination_id from destinations where destination_id = '".$arrDest[$x]."' and category_id = '".$arrC[$ii]."' ");
										foreach ($getDest as $value) {
											$sel = ($_SESSION['package']['step3']['destination_id'][$i][$keyloop]==$value['destination_id']) ? "selected" : "";
											echo "<option value='$value[destination_id]' $sel>$value[destination_name]</option>";
										}
									}
									echo "</optgroup>";
								}
							?>
							<optgroup label="Lainnya">
								<option value="0" <?php echo ($_SESSION['package']['step3']['destination_id'][$i][$keyloop]==0) ? "selected" : "" ?>>Lainnya</option>
							</optgroup>

						</select>
					</div>
					<div class="col-md-8">
						<label>Judul Trip <span class="error" id="title<?php echo $i."-$keyloop" ?>"></span></label>
						<input type="text" class="form-control" name="title<?php echo "[$i][$keyloop]" ?>" value="<?php echo $_SESSION['package']['step3']['title'][$i][$keyloop] ?>">
					</div>
					<div class="col-md-6">
						<br>
						<label>Kategori <span class="error" id="cat<?php echo $i."-$keyloop" ?>"></span></label>
						<select class="form-control" name="category_id<?php echo "[$i][$keyloop]" ?>">
							<option value="">---Select---</option>
							<?php
								$cat = get("select category_name,category_id from categories` order by category_name asc");
								foreach ($cat as $cat) {
									$sel = ($_SESSION['package']['step3']['category_id'][$i][$keyloop]==$cat['category_id']) ? "selected" : "";
									echo "<option value='$cat[category_id]' $sel>$cat[category_name]</option>";
								}
							?>
						</select>
					<br>
					</div>
					<div class="col-md-6">
						<br>
						<label>Tour Styles <span class="error" id="ts<?php echo $i."-$keyloop" ?>"></span></label>
						<div class="form-control">
							<?php 
								$t = 0;
								$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style order by tsid desc");
								foreach ($ts as $ts) {
							      $arrCheck = [];
						          foreach ($exTs as $value) {
						            if($value==$ts['tsid']){
						              array_push($arrCheck, $ts['tsid']);
						            }
						          }
						          $checked = "";
						          foreach ($arrCheck as $check) {
						            $checked = ($check==$ts['tsid']) ? "checked" : "";
						          }

							?>
							<label class="fancy-checkbox" style="display: inline-block;">
								<input type="checkbox" name="tour_style_id<?php echo "[$i][$keyloop]" ?>[]" value="<?php echo $ts['tsid'] ?>" <?php echo $checked ?>>
								<span><?php echo $ts['tsname'] ?></span>
							</label>
							&nbsp;
							<?php $t++; } ?>
						</div>
						<br>
					</div>
					<div class="col-md-6">
						<label>Waktu Mulai <span class="error" id="start<?php echo $i."-$keyloop" ?>"></span></label>
						<input type="text" name="start<?php echo "[$i][$keyloop]" ?>" class="time-picker form-control" value="<?php echo $_SESSION['package']['step3']['start'][$i][$keyloop] ?>" placeholder="Klik Disini" style="background: " readonly>
						<br>
					</div>
					<div class="col-md-6">
						<label>Waktu Berakhir <span class="error" id="end<?php echo $i."-$keyloop" ?>"></span></label>
						<input type="text" name="end<?php echo "[$i][$keyloop]" ?>" class="time-picker form-control" value="<?php echo $_SESSION['package']['step3']['end'][$i][$keyloop] ?>" placeholder="Klik Disini" style="background: " readonly>
						<br>
					</div>
					<div class="col-md-12">
						<label>Deskripsi Trip <span class="error" id="desc<?php echo $i."-$keyloop" ?>"></span></label>
						<textarea class="form-control" name="description<?php echo "[$i][$keyloop]" ?>"><?php echo $_SESSION['package']['step3']['description'][$i][$keyloop] ?></textarea>
						<br>
					</div>
					<?php 
						if($keyloop!=0){
					?>
					<div class="col-md-12">
						<a href="" class="pull-right btn btn-danger remove-trip" data-remove="<?php echo "loop".$i."-".$keyloop ?>"><span class="fa fa-remove"></span> Hapus</a>
						<br>
						<hr>
					</div>
					<?php } ?>
				</div>
			</div>
		<?php
		}
?>
			<div id="place<?php echo $i;?>">
			</div>
			<div class="col-md-12">
				<a href="" class="btn btn-primary add-trip" data-click="<?php echo $click ?>" data-loop="<?php echo $i ?>" data-target="<?php echo "place$i" ?>" data-dest="<?php echo $getDest[0]['destination_id'] ?>"><span class="fa fa-plus-circle"></span> Perbanyak Trip</a>
				<br>
				<br>
			</div>
<br>
		</div>
	</div>
<?php
	$n++;
	$day++;
	}
} 
?>
<div class="col-md-12">
	<label><span class="error" id="errdayttl"></span></label>
</div>