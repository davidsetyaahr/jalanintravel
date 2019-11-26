<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-car";
	$panel['title'] = "Transportasi";
	$panel['subtitle'] = "Transportasi / Edit Transportasi";
	$title = "Transportasi | Edit Transportasi";
	$panel['btn'] = btn_admin("view-accommodations","Transportasi", "view");
	include "../common/panel.php";
	$edit = get("select * from accommodations where accommodation_id = '".$_GET['accommodation_id']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-accommodations.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Transportasi</label>
						<input type="hidden" name="accommodation_id" class="form-control" value="<?php echo $edit[0]['accommodation_id'] ?>">
						<input type="text" name="accommodation_name" class="form-control" value="<?php echo $edit[0]['accommodation_name'] ?>">
					</div>
					<div class="col-md-6">
						<label>Photo</label>
						<input type="file" name="photo" class="form-control">
					</div>
					<div class="col-md-6">
						<br>
						<img src="<?php echo base_url()."assets/img/accommodation/".$edit[0]['photo'] ?>" class="img-responsive">
					</div>
					<div class="col-md-6">
						<br>
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