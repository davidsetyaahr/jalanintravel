<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Kota";
	$panel['subtitle'] = "Kota / Edit Kota";
	$title = "Kota | Edit Kota";
	$panel['btn'] = btn_admin("view-kota","Lihat Data","view");
	include "../common/panel.php";
	$edit = get("select * from city where city_id = '".$_GET['id_kota']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-kota.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Kota</label>
						<input type="hidden" value="<?php echo $edit[0]['city_id'] ?>" name="city_id">
						<input type="text" class="form-control" name="city_name" value="<?php echo $edit[0]['city_name'] ?>">
					</div>
					
						<div class="col-md-6">
							<label>Provinsi</label>
							<select class="form-control" name="province_id">
							
							<?php
							$sql = get("select province_id, province_name from province");
							foreach ($sql as $data) {
								$sel = ($data['province_id']==$edit[0]['province_id']) ? "selected" : "";
								echo "<option value='$data[province_id]' $sel>$data[province_name]</option>";
							}
							?>
						</select>
						</div>
						<div class="col-md-6">
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
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>