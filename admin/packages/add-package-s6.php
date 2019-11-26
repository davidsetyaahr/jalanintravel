<?php 
  if(empty($_SESSION['package']['step5'])){
      echo "<script>window.location='add-package?step=5'</script>";
  }
?>

<!--div class="col-md-12">
	<div class="alert alert-success text-center">
		<label>Tambah Paket Wisata - Step 1</label>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label>Nama Paket Wisata</label>
			<input type="text" class="form-control" value="<?php echo $_SESSION['package']['step1']['package_name'] ?>" disabled>
		</div>
		<div class="col-md-6">
		<?php 
			$dur = get("select duration_time from durations where duration_id = '".$_SESSION['package']['step1']['duration_id']."'");
		?>			
			<label>Durasi Wisata</label>
			<input type="text" class="form-control" value="<?php echo $dur[0]['duration_time']." Hari" ?>" disabled>
		</div>
		<div class="col-md-6">
			<br>
			<label>Kategori</label>
			<div class="form-control">
			<?php 
				$arrCat = explode(",", $_SESSION['package']['step1']['category_id']);
					foreach ($arrCat as $key => $value) {
					$cat = get("select category_id,category_name from categories where category_id = '$value' ");
					foreach ($cat as $cat) {
			?>
					<label class="fancy-checkbox" style="display: inline-block;">
						<input type="checkbox" name="category_id[]" value="<?php echo $cat['category_id'] ?>" checked disabled>
						<span><?php echo $cat['category_name'] ?></span>					
					</label>
					&nbsp;
			<?php
				}
			}
			?>
			</div>
		</div>
		<div class="col-md-6">
		<br>
			<label>Tour Styles</label>
			<div class="form-control">
			<?php 
				$arrTs = explode(",", $_SESSION['package']['step1']['tour_style_id']);
				foreach ($arrTs as $key => $value) {
					$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style where tour_style_id = '$value' order by tsid desc");
					foreach ($ts as $ts) {
					?>
						<label class="fancy-checkbox" style="display: inline-block;">
							<input type="checkbox" name="tour_style_id[]" value="<?php echo $ts['tsid'] ?>" checked disabled>
							<span><?php echo $ts['tsname'] ?></span>					
						</label>
						&nbsp;
				<?php } } ?>
			</div>
		</div>

	</div>
</div-->
<div class="col-md-8 col-md-offset-2">
	<br>
	<div class="alert alert-danger text-center">
		<label>Berikan Diskon Untuk Paket Ini?</label>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<label id="errsale" class="error"></label>
			<div class="input-group">
				<span class="input-group-addon">Diskon</span>
				<input type="number" name="sale" value="0" class="form-control">
				<span class="input-group-addon">%</span>
			</div>
		</div>
	</div>
	<br>
</div>