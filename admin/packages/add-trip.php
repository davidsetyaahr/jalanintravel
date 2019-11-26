<?php 
session_start();
	include "../../config/model.php";
?>
			<div class="col-md-12" id="<?php echo "loop".$_POST['id'] ?>">
	<hr>
				<div class="row">
					<div class="col-md-4">
						<label>Destinasi Wisata <span class="error" id="dest<?php echo $_POST['loop']."-".$_POST['id'] ?>"></span></label>
						<input type="hidden" class="form-control" value="<?php echo $_POST['destination_id'] ?>" name="dest[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]">
						<select class="form-control" name="destination_id[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]">
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
						<label>Judul Trip <span class="error" id="title<?php echo $_POST['loop']."-". $_POST['id'] ?>"></span></label>
						<input type="text" class="form-control" name="title[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]">
					</div>
					<div class="col-md-6">
						<br>
						<label>Kategori <span class="error" id="cat<?php echo $_POST['loop']."-". $_POST['id'] ?>"></span></label>
						<select class="form-control" name="category_id[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]">
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
						<label>Tour Styles <span class="error" id="ts<?php echo $_POST['loop']."-". $_POST['id'] ?>"></span></label>
						<div class="form-control">
							<?php 
								$t = 0;
								$ts = get("select tour_style_name tsname, tour_style_id tsid from tour_style order by tsid desc");
								foreach ($ts as $ts) {
							?>
							<label class="fancy-checkbox" style="display: inline-block;">
								<input type="checkbox" name="tour_style_id[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>][]" value="<?php echo $ts['tsid'] ?>">
								<span><?php echo $ts['tsname'] ?></span>	
							</label>
							&nbsp;
							<?php $t++; } ?>
						</div>
						<br>
					</div>
					<div class="col-md-6">
						<label>Waktu Mulai <span class="error" id="start<?php echo $_POST['loop']."-". $_POST['id'] ?>"></span></label>
						<input type="text" class="time-picker form-control" placeholder="Klik Disini" name="start[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]" style="background: " readonly>
						<br>
					</div>
					<div class="col-md-6">
						<label>Waktu Berakhir <span class="error" id="end<?php echo $_POST['loop']."-". $_POST['id'] ?>"></span></label>
						<input type="text" class="time-picker form-control" name="end[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]" placeholder="Klik Disini" style="background: " readonly>
						<br>
					</div>
					<div class="col-md-12">
						<label>Deskripsi Trip <span class="error" id="desc<?php echo $_POST['loop']."-". $_POST['id'] ?>"></span></label>
						<textarea class="form-control" name="description[<?php echo $_POST['loop'] ?>][<?php echo $_POST['id'] ?>]"></textarea>
						<br>
					</div>
					<div class="col-md-12">
						<a href="" class="pull-right btn btn-danger remove-trip" data-remove="<?php echo "loop".$_POST['id'] ?>"><span class="fa fa-remove"></span> Hapus</a>
						<br>
						<hr>
					</div>
				</div>
			</div>
