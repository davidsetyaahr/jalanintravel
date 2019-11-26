<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-map-marker";
	$panel['title'] = "Destinasi";
	$panel['subtitle'] = "Destinasi Wisata / Edit Destinasi Wisata";
	$panel['btn'] = btn_admin("index","Lihat Data","view");
	include "../common/panel.php";
	$title = "Destinations | Edit Destinations";
	$dest = get("select * from destinations where destination_id = '".$_GET['q']."'");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="" method="" id="edit-destination" enctype="multipart/form-data">
			<div class="col-md-6">
				<input type="hidden" name="destination_id" value="<?php echo $dest[0]['destination_id'] ?>">
				<label>Nama Destinasi <small id="errdsname" class="error"></small></label>
				<input type="text" class="form-control" name="destination_name" value="<?php echo $dest[0]['destination_name'] ?>">
			</div>
			<div class="col-md-6">
				<label>Kota <small id="errcity" class="error"></small></label>
				<select class="form-control" name="city_id">
					<option value="">---Select---</option>
					<?php 
						$city = get("select city_name,city_id from city order by city_name asc");
						foreach ($city as $city) {
							$selected = ($city['city_id']==$dest[0]['city_id']) ? "selected" : "";
							echo "<option value='$city[city_id]' $selected>$city[city_name]</option>";
						}
					?>
				</select>
			</div>
			<div class="col-md-6">
				<br>
				<label>Kategori Destinasi <small id="errcat" class="error"></small></label>
				<select class="form-control" name="category_id">
					<option value="">---Select---</option>
					<?php 
						$cat = get("select category_name,category_id from categories` order by category_name asc");
						foreach ($cat as $cat) {
							$selected = ($cat['category_id']==$dest[0]['category_id']) ? "selected" : "";
							echo "<option value='$cat[category_id]' $selected>$cat[category_name]</option>";
						}
					?>
				</select>
			</div>
			<div class="col-md-6">
				<br>
				<label>Tour Styles <small id="errts" class="error"></small></label>
				<div class="form-control">
					<?php 
						$exts = explode(",", $dest[0]['tour_styles_id']);
						$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style order by tsid desc");
						$nc = 0;
						foreach ($ts as $ts) {
							$arrCheck = [];
							foreach ($exts as $val ) {
								if($val==$ts['tsid']){
									array_push($arrCheck, $ts['tsid']);
								}
							}
							$checked = "";
							foreach ($arrCheck as $check) {
								$checked = ($check==$ts['tsid']) ? "checked" : "";
							}
					?>
					<label class="fancy-checkbox" style="display: inline-block;">
						<input type="checkbox" name="tour_style_id[]" value="<?php echo $ts['tsid'] ?>" <?php echo $checked; ?>>
						<span><?php echo $ts['tsname'] ?></span>					
					</label>
					&nbsp;
					<?php } ?>
				</div>
			</div>
			<div class="col-md-12">
				<br>
				<label>Overview <small id="erroverview" class="error"></small></label>
				<textarea class="form-control" name="overview" class="textarea"><?php echo $dest[0]['overview'] ?></textarea>
			</div>
			<div class="col-md-12">
				<br>
				<div class="thumbnail">
					<?php
						$exImg = explode(",", $dest[0]['img']);
					?>
					<button class="add_field_button btn btn-primary" data-arrcount="<?php echo count($exImg) ?>"><span class="fa fa-plus-circle"></span> Tambah File Lagi</button>
					<div class="row input_fields_wrap ">
					    <?php 
					    	$div = 1;
					    	$errN = 0;
					    	for($i=0;$i<count($exImg);$i++){
					    ?>
					    <div id="div<?php echo $div ?>">
							<div class="col-md-6">
								<br>
								<div class="thumbnail">
								<div class="row">
									<br>
									<div class="col-md-4" style="padding-right: 0px;">
									<img src="<?php echo base_url()."assets/img/destinations/".$exImg[$i] ?>" class="img-responsive img-rounded thumbnail" style="height: 100px !important;">
									</div>
									<div style="padding-left: 10px;" class="col-md-8">
										<label>Foto <small id="errimg" class="error"></small> <small id="errorimg<?php echo $errN ?>" class="error"></small></label>
										<input type="file" class="form-control" name="img[]">
									</div>
								</div>
							</div>
							</div>
						</div>
					<?php $div++;
						$errN++;
					 } ?>
				    </div>
				</div>
			</div>			
			<div class="col-md-12">
				<br>
			<div class="thumbnail">
				<h4 class="text-center">
					<b>Informasi Tentang Destinasi <small id="errinfo" class="error"></small></b>
				</h4>
				  <!-- The toolbar will be rendered in this container. -->
				    <div id="toolbar-container"></div>

				    <!-- This container will become the editable. -->
				    <div id="editor">
				    	<?php echo $dest[0]['information'] ?>
				    </div>
				</div>
    		</div>
    		<div class="col-md-6">
    			<label>Google Map (URL)</label>
    			<input type="text" class="form-control" name="map" value="<?php echo $dest[0]['map'] ?>">
    		</div>
    		<div class="col-md-6">
    			<br>
    			<?php 
    				btn_add();
    			?>
    		</div>
			</form>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>