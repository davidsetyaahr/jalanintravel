<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-apartment";
	$panel['title'] = "Kantor Cabang";
	$panel['subtitle'] = "Kantor Cabang / Tambah Kantor Cabang";
	$panel['btn'] = btn_admin("view-kantor-cabang","Lihat Data","view");
	$title = "Kantor Cabang | Add Kantor Cabang";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="add-kantor-cabang.php" method="POST" enctype="multipart/form-data">
				
				<div class="row">

					<div class="col-md-6">
						<label>Kota</label>
						<select class="form-control" name="Id_Kota">
							<option>Select</option>
							<?php
							$sql = get("select city_id,city_name from city");
							foreach ($sql as $data) {
								echo "<option value='$data[city_id]'>$data[city_name]</option>";
							}
							?>
						</select>
					</div>

					<div class="col-md-6">
						<label>Alamat</label>
						<input type="text" name="Alamat" class="form-control" placeholder="masukkan alamat anda">
					</div>
					<div class="col-md-6">
						<br>
						<label>Nomor Handphone</label>
						<input type="text" name="Nomor_Handphone" class="form-control">
					</div>
					<div class="col-md-6">
						<br>
						<label>Foto</label>
						<input type="file" name="img" class="form-control">
					</div>
				</div>
				<div class="row">
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
