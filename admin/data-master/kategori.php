<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya/Lainnya Tambah Kategori";
	$panel['btn'] = btn_admin("view-kategori","Lihat data","view");
	$title = "Kategori | Add Kategori";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
				<form action="add-kategori" method="post" enctype="multipart/form-data">
			<div class="col-md-6">
				<label>Nama Kategori</label>
				<input type="text" name="kategori" class="form-control">
			</div>
			<div class="col-md-6">
				<label>icon</label>
				<input type="file" name="icon" class="form-control">
			</div>
			<div class="col-md-6">
				<br>
				<?php 
				echo btn_add();
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