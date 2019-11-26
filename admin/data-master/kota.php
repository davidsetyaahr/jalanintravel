<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-home";
	$panel['title'] = "Kota";
	$panel['subtitle'] = "Kota / Daftar Kota";
	$panel['btn'] = btn_admin("view-kota","Lihat Data","view");
	$title = "Kota | View Kota";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="add-kota" method="post">
			<div class="col-md-6">
			<label>Provinsi</label>
			<select class="form-control" name="id_provinsi">
				<option value="">---Select---</option>
				<?php 
					$sql = get("select * from province");
					foreach ($sql as $data) {
						echo "<option value='$data[province_id]'>$data[province_name]</option>";
					}
				?>
			</select>
		</div>
		<div class="col-md-6">
			<label>nama-kota</label>
			<div><input type="text" name="nama_kota" class="form-control"></div>
			<br>
			<input type="submit" class="btn btn-primary" name="" value="Tambah">
		</div>
	</form>
		</div>
		</div>
		
	</div>
</div>

<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>