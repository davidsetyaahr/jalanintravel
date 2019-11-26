<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-home";
	$panel['title'] = "Kota";
	$panel['subtitle'] = "Kota / Daftar Kota";
	$panel['btn'] = btn_admin("index","Tambah Kota","add");
	$title = "Kota | View Kota";
	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">	
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Kota</td>
						<td>Provinsi</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sql = get("select c.city_name, c.city_id,p.province_name from city as c join province as p on c.province_id = p.province_id");
						$no=0;
						foreach ($sql as $city) {
							$no++;
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $city['city_name'] ?></td>
							<td><?php echo $city['province_name'] ?></td>
							<td><a href="edit-kota?id_kota=<?php echo $city['city_id'] ?>">Edit</a></td>
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