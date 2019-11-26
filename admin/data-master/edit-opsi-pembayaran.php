<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya / Edit Opsi-Pembayaran";
	$title = "Opsi Pembayaran | Edit Opsi Pembayaran";
	$panel['btn'] = btn_admin("view-opsi-pembayaran","Pembayaran", "view");
	include "../common/panel.php";
	$edit = get("select * from bank_option where bank_id = '".$_GET['id_bank']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="update-opsi-pembayaran.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Bank</label>
						<input type="hidden" name="bank_id" class="form-control" value="<?php echo  $edit[0]['bank_id']?>">
						<input type="text" name="bank_name" class="form-control" value="<?php echo $edit[0]['bank_name'] ?>">
					</div>
					<div class="col-md-6">
					 <label>Nomor Rekening</label>
					 <input type="text" name="rekening_number" class="form-control" value="<?php echo $edit[0]['rekening_number']?>">
					</div>
				</div>
					<div class="row">
						<br>
						<div class="col-md-6">
							<label>Atas Nama</label>
							<input type="text" name="fullname" class="form-control" value="<?php echo $edit[0]['fullname']?>">
						</div>
						<div class="col-md-6">
							<label>logo</label>
							<input type="file" name="logo" class="form-control">
						</div>
						<div class="col-md-6">
							<br>
							<div class="thumbnail">
							<img src="<?php echo base_url()."assets/img/bank-option/".$edit[0]['logo'] ?>" class="img-responsive">
							</div>
						</div>
						<div class="col-md-6">
							<br>
							<?php
								btn_add()
							 ?>
						</div>
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
