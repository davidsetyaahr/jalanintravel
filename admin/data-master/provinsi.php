<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya/Tambah Provinsi";
	$title = "Provinsi | Provinsi";
	$panel['btn'] = btn_admin("view-provinsi","lihat data", "view");
	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<form action="add-provinsi" method="post">
				<label>Nama Provinsi</label>
				<input type="text" name="provinsi" class="form-control">
				<br>
					<input type="submit" class="btn btn-success" name="" value="Tambah">
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>