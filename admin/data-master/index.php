<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-home";
	$panel['title'] = "Kota";
	$panel['subtitle'] = "Kota / Tambah Kota";
	$panel['btn'] = btn_admin("view-kota","Lihat Data","view");
	$title = "Kota | Tambah Kota";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="add-kota.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Kota</label>
						<input type="text" name=city_name class="form-control">
					</div>
					<div class="col-md-6">
						<label>Provinsi</label>
						<select class="form-control" name="province_id">
						<?php
						$sql = get("select province_id, province_name from province");
						foreach ($sql as $data) {
							echo "<option value='$data[province_id]'>$data[province_name]</option>";
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