<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya / Edit Kategori";
	$title = "Kategori | Edit Kategori";
	$panel['btn'] = btn_admin("view-kategori","kategori", "view");
	include "../common/panel.php";
	$edit = get("select * from categories where category_id = '".$_GET['id_category']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-kategori.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
					<label>Nama Kategori</label>
					<input type="hidden" name="category_id" class="form-control" value="<?php echo $edit[0]['category_id'] ?>">
					<input type="text" name="category_name" class="form-control" value="<?php echo $edit[0]['category_name'] ?>">
				</div>
				<div class="col-md-6">
					<label>Icon</label>
					<input type="file" name="icon" class="form-control">
				</div>
				<div class="col-md-6">
					<br>
					<div class="thumbnail">
					<img src="<?php echo base_url()."assets/img/category/".$edit[0]['icon'] ?>" class="img-responsive">
					</div>
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
