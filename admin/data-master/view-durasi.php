<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Durasi";
	$panel['subtitle'] = "Data Durasi / Daftar Durasi";
	$panel['btn'] = btn_admin("durasi","Tambah ","add");
		$title = "Durasi | View Durasi";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>No</td>
						<td>Nama Durasi</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = get("select * from durations");
						$no=0;
						foreach ($sql as $durations) {
							$no++;

					 ?>
					 <tr>
					 	<td><?php echo $no ?></td>
					 	<td><?php echo $durations['duration_time'] ?> Hari</td>
					 	<td><a href="edit-durasi?id_durasi=<?php echo $durations['duration_id'] ?>">Edit</a></td>
					 </tr	>
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
