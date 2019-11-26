<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-user";
	$panel['title'] = "Pemandu Wisata";
	$panel['subtitle'] = "Pemandu Wisata / Data Pemandu Wisata";
	$panel['btn'] = btn_admin("view-tour-guide","Lihat data","view");
	$title = "Pemandu Wisata | Tambah Pemandu Wisata";

	include "../common/panel.php";
?>
<div class="panel panel headline">
	<div class="panel-body">
		<div class="row">
			<form method="POST" action="add-tour-guide" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Pemandu Wisata</label>
						<input type="text" name="tour_guide_name" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Foto</label>
						<input type="file" name="photo" class="form-control">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<label>Nomor Handpone</label>
						<input type="text" name="nomor_handphone" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Alamat</label>
						<input type="text" name="address" class="form-control">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<label>Deskripsi</label>
						<textarea class="form-control" name="description" rows="5"></textarea>
						
					</div>
					<div class="col-md-6">
						<label>Tarif Per-trip</label>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="number" name="tarif" class="form-control">
							<span class="input-group-addon">/trip</span>
						</div>
					</div>
					<div class="col-md-6">
						<br>
						<?php echo btn_add(); ?>
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