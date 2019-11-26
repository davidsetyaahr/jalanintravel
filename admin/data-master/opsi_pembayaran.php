<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-Keyboard";
	$panel['title'] = "Lainnnya";
	$panel['subtitle'] = "Lainnya/Tambah Opsi-Pembayaran";
	$title = "Opsi Pembayaran | Tambah Opsi Pembayaran";
	$panel['btn'] = btn_admin("view-opsi-pembayaran","Lihat Data", "view");
	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="add-opsi_pembayaran" method="post" enctype="multipart/form-data">
			<div class="col-md-6">
				<label>Nama Bank</label>
				<input type="text" name="bank_name" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Logo</label>
				<input type="file" name="logo" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<br>
				<label>Nomor Rekening</label>
				<input type="text" name="rekening_number" class="form-control">
			</div>
			<div class="col-md-6">
				<br>
				<label>Atas Nama</label>
				<input type="text" name="fullname" class="form-control">
			</div>
			<div class="col-md-6">
				<br>
				<?php 
					echo btn_add();
				?>
			</div>
			</form>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>