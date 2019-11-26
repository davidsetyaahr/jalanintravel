<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-car";
	$panel['title'] = "Transportasi";
	$panel['subtitle'] = "Transportasi / Daftar Transportasi";
	$panel['btn'] = btn_admin("view-accommodations","view","view");
	$title = "Transportasi | List Transportasi";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="add-accommodations.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Transportasi</label>
						<input type="text" name="accommodations_name" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Photo</label>
						<input type="file" name="photo" class="form-control">
					</div>
					<div class="col-md-6">
						<br>
						<?php echo btn_add() ?>
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