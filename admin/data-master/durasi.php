<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Durasi";
	$panel['subtitle'] = "Durasi / Tambah Durasi Trip";
	$panel['btn'] = btn_admin("view-durasi","Lihat Durasi","view");
		$title = "Durasi | Durasi";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<form action="add-durasi" method="post">
					<label>Durasi</label>
					<div class="input-group">
						<span class="input-group-addon">Trip</span>
						<input type="number" name="durasi" class="form-control">
						<span class="input-group-addon">Hari</span>
					</div>

					<br>
					<?php 
					echo btn_add();
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>
