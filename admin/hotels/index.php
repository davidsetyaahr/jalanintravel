<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-store";
	$panel['title'] = "Hotel";
	$panel['subtitle'] = "Hotel / Daftar Hotel";
	$panel['btn'] = btn_admin("view-data-hotels","Lihat Data","view");
		$title = "hotels | index hotels";


	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form  method="POST"  action="add-data-hotels.php" enctype="multipart/form-data">
				<div class="row">
			<div class="col-md-6">
				<label>Nama Hotel</label><br>
				<input type="text" name="hotel_name" placeholder="Masukkan Nama Hotel" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Photo</label>
				<input type="file" name="photo" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<br>
				<label>Bintang</label>
				<input type="number" name="star" class="form-control">
			</div>
			<div class="col-md-6">
				<br>
				<label>Alamat</label>
				<input type="text" name="address" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<br>
				<label>Deskripsi</label>
				<input type="text" name="descriptions" class="form-control"><br>
			</div>
				<div class="col-md-6">
					<br>
					<br>
					<?php
					btn_add();
					 ?>
				</div>
		</div>
		</div>
	</div>
	</form>
	</div>
</div>

<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>
