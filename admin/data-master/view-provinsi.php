<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnya/Data Provinsi";
	$title = "Provinsi | Data Provinsi";
	$panel['btn'] = btn_admin("provinsi","Tambah", "add");
	

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table teble-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Provinsi</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = get("select * from province");
					$no=0;
					foreach ($sql as $province) {
						$no++;
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $province['province_name'] ?></td>
							<td><a href= "edit-provinsi?id_province=<?php echo $province['province_id'] ?>">Edit
							</a></td>
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