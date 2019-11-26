<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnnya / Tambah Kategori Umur";
	$panel['btn'] = btn_admin("view-range","lihat data","view");
	$title = "Umur | Tambah Kategori Umur";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form method="POST" action="add-range" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Kategori</label>
						<input type="text" name="name_pax_category" class="form-control">
					</div>
					<div class="col-md-6">
							<label>Range Usia</label>
							<div class="input-group">
							<span class="input-group-addon">Dari Umur</span>
							<input type="number" name="range1" class="form-control">
							<span class="input-group-addon">Tahun</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<br>
							<label>Range Usia</label>
							<div class="input-group">
							<span class="input-group-addon">Sampai Umur</span>
							<input type="number" name="range2" class="form-control">
							<span class="input-group-addon">Tahun</span>
						</div>
					</div>
					<div class="col-md-6">
						<br>
						<br>
						<?php echo btn_add(); ?>
					</div>
				</div>

			</form>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>