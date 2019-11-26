<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya/Data Pembayaran";
	$panel['btn'] = btn_admin("opsi_pembayaran","Tambah","add");
	$title = "opsi_pembayaran | list_pembayaran";
	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body"
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<td>#</td>
					<td>Nama Bank</td>
					<td>Logo</td>
					<td>Nomor Rekening</td>
					<td>Atas Nama</td>
					<td>Opsi</td>
				</tr>
				</thead>
				<tbody>
					<?php 	
						$sql = get("select * from bank_option");
						$no=0;
						foreach ($sql as $bank_option) {
						$no++;
					 ?>
					 <tr>
					 	<td><?php echo $no?></td>
					 	<td><?php echo $bank_option['bank_name']?></td>
					 	<td><a href="<?php echo base_url()."assets/img/bank-option/".$bank_option ['logo'] ?>" target="_blank"><?php echo $bank_option ['logo'] ?></a></td>
					 	<td><?php echo $bank_option['rekening_number']?></td>
					 	<td><?php echo $bank_option['fullname']?></td>
					 	<td><a href="edit-opsi-pembayaran?id_bank=<?php echo $bank_option['bank_id'] ?>">Edit</a> || <a href="hapus-opsi-pembayaran?id_bank=<?php echo $bank_option['bank_id'] ?>">Hapus</a></td>
					 </tr>
					 <?php 	
					}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>