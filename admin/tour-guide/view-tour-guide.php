<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-user";
	$panel['title'] = "Pemandu Wisata";
	$panel['subtitle'] = "Pemandu Wisata / Data Pemandu Wisata";
	$panel['btn'] = btn_admin("index","Tambah","add");
	$title = "Pemandu Wisata | Tambah Pemandu Wisata";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Nama</td>
						<td>Nomor Handphone</td>
						<td>Tarif/trip</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sql = get("select * from tour_guide");
					$no = 0;
					foreach ($sql as $pemandu) {
						$no++;
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $pemandu['tour_guide_name']; ?></td>
						<td><?php echo $pemandu['nomor_handphone']; ?></td>
						<td><?php echo "Rp ".number_format($pemandu['Tarif'],0,',','.'); ?></td>
						<td><a href="edit-tour-guide?tour_guide_id=<?php echo $pemandu['tour_guide_id']; ?>">Detail & Edit</a></td>
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