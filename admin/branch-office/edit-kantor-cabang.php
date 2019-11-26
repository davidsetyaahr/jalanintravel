<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-apartment";
	$panel['title'] = "Kantor Cabang";
	$panel['subtitle'] = "Kantor Cabang / Edit Kantor Cabang";
	$title = "Kantor Cabang | Edit Kantor Cabang";
	$panel['btn'] = btn_admin("view-kantor-cabang","Lihat Data","view");
	include "../common/panel.php";
	$edit = get("select * from branch_office where office_id = '".$_GET['office_id']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form action="update-kantor-cabang.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Kota</label>
						<select class="form-control" name="city_id">
						<option value="">Select</option>
							<?php
							$sql = get("select city_id,city_name from city");
							foreach ($sql as $data) {
								$sel = ($data['city_id']==$edit[0]['city_id']) ? "selected" : "";
								echo "<option value='$data[city_id]' $sel>$data[city_name]</option>";
							}
							?>
						</select>
					</div>
						<div class="col-md-6">
							<label>Alamat</label>
							<input type="hidden" name="office_id" class="form-control" value="<?php echo $edit[0]['office_id'] ?>">
							<input type="text" name="address" class="form-control" value="<?php echo $edit[0]['address'] ?>">
						</div>
						<div class="col-md-6">
							<br>
							<label>Nomor Handphone</label>
							<input type="text" name="phone_number" class="form-control" value="<?php echo $edit[0]['phone_number'] ?>">
						</div>
						<div class="col-md-6">
						<br>
						<label>Photo</label>
						<input type="file" name="img" class="form-control">
					</div>
						<div class="col-md-6">
						<br>
						<div class="thumbnail">
						<img src="<?php echo base_url()."assets/img/branch-office/".$edit[0]['img'] ?>" class="img-responsive" width="50%">
						</div>
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

<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>