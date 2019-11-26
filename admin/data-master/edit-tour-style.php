<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya / Edit Tour Style";
	$title = "Tour Style | Edit Tour Style";
	$panel['btn'] = btn_admin("view-tour-style","style", "view");
	include "../common/panel.php";
	$edit = get("select * from tour_style where tour_style_id = '".$_GET['id_tour_style']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-tour-style.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
					<label>Tour Style</label>
					<input type="hidden" name="tour_style_id" class="form-control" value="<?php echo $edit[0]['tour_style_id'] ?>">
					<input type="text" name="tour_style_name" class="form-control" value="<?php echo $edit[0]['tour_style_name'] ?>">
				</div>
				<div class="col-md-6">
					<label>icon</label>
					<input type="file" name="icon" class="form-control">
				</div>
				<div class="col-md-6">
					<br>
					<div class="thumbnail">
					<img src="<?php echo base_url()."assets/img/tour-style/".$edit[0]['icon'] ?>" class="img-responsive">
					</div>
				</div>
				<div class="col-md-6">
					<br>
					<br>
					<?php 
					btn_add()
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
