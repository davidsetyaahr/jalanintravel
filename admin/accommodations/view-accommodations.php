<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-car";
	$panel['title'] = "Transportasi";
	$panel['subtitle'] = "Transportasi/Data Transportasi";
	$panel['btn'] = btn_admin("index","tambah","add");
	$title = "Transportasi | List Transportasi";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Nama Transportasi</td>
						<td>Foto</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sql = get("select * from accommodations order by accommodation_id desc");
						$no=0;
						foreach ($sql as $accommodations) {
							$no++;
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $accommodations['accommodation_name'] ?></td>
							<td><a href="<?php echo base_url()."assets/img/accommodation/".$accommodations['photo'] ?>" target="_blank"><?php echo $accommodations['photo'] ?></a></td>
							<td><a href="edit-accommodations?accommodation_id=<?php echo $accommodations['accommodation_id'] ?>">Edit</a></td>
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