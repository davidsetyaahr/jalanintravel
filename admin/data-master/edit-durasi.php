<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Durasi";
	$panel['subtitle'] = "Durasi / Edit Durasi";
	$title = "Durasi | Edit Durasi";
	$panel['btn'] = btn_admin("view-durasi","Lihat Durasi", "view");
	include "../common/panel.php";
  $edit = get("select * from durations where duration_id = '".$_GET['id_durasi']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<form action="update-durasi" method="post">
					<label>Durasi</label>
					<input type="hidden" name="duration_id" class="form-control" value="<?php echo $edit[0]['duration_id'] ?>">
					<div class="input-group">
						<span class="input-group-addon">Trip</span>
							<input type="number" name="duration_time" class="form-control" value="<?php echo $edit[0]['duration_time'] ?>">
						<span class="input-group-addon">Hari</span>
					</div>

					<br>
			      <?php
			        btn_add();
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
