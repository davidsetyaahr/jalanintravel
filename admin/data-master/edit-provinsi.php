<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya / Edit provinsi";
	$title = "Provinsi | Edit Provinsi";
	$panel['btn'] = btn_admin("view-provinsi","Provinsi", "view");
	include "../common/panel.php";
	$edit = get("select * from province where province_id = '".$_GET['id_province']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-provinsi.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Provinsi</label>
							<input type="hidden" name="province_id" class="form-control" value="<?php echo $edit[0]['province_id'] ?>">
						<input type="text" name="province_name" class="form-control" value="<?php echo $edit[0]['province_name'] ?>">
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
