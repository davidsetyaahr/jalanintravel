<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-apartment";
	$panel['title'] = "Kantor Cabang";
	$panel['subtitle'] = "Kantor Cabang / Daftar Kantor Cabang";
	$panel['btn'] = btn_admin("index","Tambah","add");
	include "../common/panel.php";
	$title = "Kantor Cabang | View Kantor Cabang";

?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
					<td>No</td>
					<td>Kota</td>
					<td>Alamat</td>
					<td>Nomor Handphone</td>
					<td>Opsi</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = get("select bo.*,c.city_name from branch_office bo join city c on bo.city_id = c.city_id");
				$no = 0;
				foreach ($sql as $branch_office) {
					$no++;
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $branch_office['city_name'] ?></td>
					<td><?php echo $branch_office['address'] ?></td>
					<td><?php echo $branch_office['phone_number'] ?></td>
					<td><a href="edit-kantor-cabang?office_id=<?php echo $branch_office['office_id'] ?>"> Edit </td>
					</tr>
					<?php
				} ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>