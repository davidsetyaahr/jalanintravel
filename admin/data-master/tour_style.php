<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya/Tambah Tour_Style";
	$title = "Tour_Style | Edit Tour_Style";
	$panel['btn'] = btn_admin("view-tour-style","Lihat data","view");

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
				<form action="add-tour-style" method="post" enctype="multipart/form-data">
			<div class="col-md-6">
				<label>Tour Style</label>
				<input type="text" name="tour_style" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Icon</label>
				<input type="file" name="icon" class="form-control">
			</div>
			<div class="col-md-6">
			<br>
			<?php echo btn_add(); ?>
		</div>
			</form>
	</div>
</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>