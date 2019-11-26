<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-map-marker";
	$panel['title'] = "Destinasi";
	$panel['subtitle'] = "Destinasi Wisata / Daftar Destinasi Wisata";
	$panel['btn'] = btn_admin("index","Lihat Data","view");
	include "../common/panel.php";
	$title = "Destinations | Add Destinations";

?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="" method="" id="add-destination" enctype="multipart/form-data">
				
			<div class="col-md-6">
				<label>Nama Destinasi <small id="errdsname" class="error"></small></label>
				<input type="text" class="form-control" name="destination_name">
			</div>
			<div class="col-md-6">
				<label>Kota <small id="errcity" class="error"></small></label>
				<select class="form-control" name="city_id">
					<option value="">---Select---</option>
					<?php 
						$city = get("select city_name,city_id from city order by city_name asc");
						foreach ($city as $city) {
							echo "<option value='$city[city_id]'>$city[city_name]</option>";
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
							echo "<option value='$cat[category_id]'>$cat[category_name]</option>";
						}
					?>
				</select>
			</div>
			<div class="col-md-6">
				<br>
				<label>Tour Styles <small id="errts" class="error"></small></label>
				<div class="form-control">
					<?php 
						$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style order by tsid desc");
						foreach ($ts as $ts) {
					?>
					<label class="fancy-checkbox" style="display: inline-block;">
						<input type="checkbox" name="tour_style_id[]" value="<?php echo $ts['tsid'] ?>">
						<span><?php echo $ts['tsname'] ?></span>					
					</label>
					&nbsp;
					<?php } ?>
				</div>
			</div>
			<div class="col-md-12">
				<br>
				<label>Overview <small id="erroverview" class="error"></small></label>
				<textarea class="form-control" name="overview" class="textarea"></textarea>
			</div>
			<div class="col-md-12">
				<br>
				<div class="thumbnail">
					<button class="add_field_button btn btn-primary" data-arrcount="1"><span class="fa fa-plus-circle"></span> Tambah File Lagi</button>
					<div class="row input_fields_wrap ">
					    <div id="div1">
							<div class="col-md-6">
								<label class="mt15">Foto <small id="errimg" class="error"></small> <small id="errorimg0" class="error"></small></label>
								<input type="file" class="form-control" name="img[]">
							</div>
						</div>
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
				    	<i>Informasi Tentang Destinasi Disini</i>
				    </div>
				</div>
    		</div>
    		<div class="col-md-6">
    			<label>Google Map (URL)</label>
    			<input type="text" class="form-control" name="map">
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
?>\