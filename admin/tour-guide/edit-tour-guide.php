<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-user";
	$panel['title'] = "Pemandu Wisata";
	$panel['subtitle'] = "Pemandu Wisata / Edit Pemandu Wisata";
	$panel['btn'] = btn_admin("view-tour-guide","Lihat data","view");
	$title = "Pemandu Wisata | Edit Pemandu Wisata";
	include "../common/panel.php";
	$edit = get("select * from tour_guide where tour_guide_id = '".$_GET['tour_guide_id']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form method="post" action="update" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Pemandu Wisata</label>
						<input type="hidden" name="tour_guide_id" class="form-control" value="<?php echo $edit[0]['tour_guide_id']; ?>">
						<input type="text" name="tour_guide_name" class="form-control" value="<?php echo $edit[0]['tour_guide_name']; ?>">
					</div>
					<div class="col-md-6">
						<label>Foto</label>
						<input type="file" name="photo" class="form-control">
					</div>

					<div class="col-md-6">
						<br>
						<div class="thumbnail">
						<img src="<?php echo base_url()."assets/img/tour-guide/".$edit[0]['photo']; ?>" class="img-responsive" width="50%">
						</div>
					</div>
					<div class="col-md-6">
						<br>
						<label>Nomor Handpone</label>
						<input type="text" class="form-control" name="nomor_handphone" value="<?php echo $edit[0]['nomor_handphone']; ?>">
						<br>
						<label>Alamat</label>
						<input type="text" name="address" class="form-control" value="<?php echo $edit[0]['address'] ?>">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<label>Deskripsi</label>
						<textarea class="form-control" name="description" rows="5" ><?php echo $edit[0]['description']; ?></textarea>
					</div>
					<div class="col-md-6">
						<label>Tarif Per-trip</label>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="text" name="Tarif" class="form-control" value="<?php echo $edit[0]['Tarif']; ?>">
							<span class="input-group-addon">/trip</span>
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
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>