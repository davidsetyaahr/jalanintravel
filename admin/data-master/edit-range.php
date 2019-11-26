<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnnya/Edit Usia";
	$panel['btn'] = btn_admin("range","lihat data","view");
	$title = "Usia | Edit Usia";
	$edit = get("select * from pax_categories where pax_category_id = '".$_GET['pax_category_id']."' ");

	include "../common/panel.php";
	$ex = explode("-", $edit[0]['range_age']);
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form method="POST" action="update-range" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Kategori</label>
						<input type="hidden" class="form-control" name="pax_category_id" value="<?php echo $edit[0]['pax_category_id']; ?>">
						<input type="text" class="form-control" name="name_pax_category" value="<?php echo $edit[0]['name_pax_category']; ?>">
					</div>
					<div class="col-md-6">
							<label>Range Usia</label>
							<div class="input-group">
							<span class="input-group-addon">Dari Umur</span>
						<input type="text" name="range1" class="form-control" value="<?php echo $ex[0]; ?>">
							<span class="input-group-addon">Tahun</span>
						</div>
					</div>
					<div class="col-md-6">
						<br>
							<label>Range Usia</label>
							<div class="input-group">
							<span class="input-group-addon">Dari Umur</span>
							<input type="text" name="range2" class="form-control" value="<?php echo $ex[1]; ?>">
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