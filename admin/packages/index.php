<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-earth";
	$panel['title'] = "Packages";
	$panel['subtitle'] = "Packages / Daftar Packages";
	$panel['btn'] = btn_admin("add-package","Paket Wisata","add");
	include "../common/panel.php";
	$title = "Packages | View Tour Packages";
	$packages = get("SELECT p.package_id,p.package_name,d.duration_time,p.tour_styles_id,p.img,p.overview,p.min_pax,p.max_pax,p.url from packages p join durations d on p.duration_id = d.duration_id");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<td>#</td>
					<td>Nama Paket</td>
					<td>Durasi</td>
					<td>Min PAX</td>
					<td>Max PAX</td>
					<td>Url</td>
					<td>Opsi</td>
				</thead>
				<tbody>
				<?php 
					$no =0;
					foreach ($packages as $data) {
					$no++;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data['package_name'] ?></td>
						<td><?php echo $data['duration_time'] ?> Hari</td>
						<td><?php echo $data['min_pax'] ?> PAX</td>
						<td><?php echo $data['max_pax'] ?> PAX</td>
						<td><?php echo $data['url'] ?></td>
						<td class="dropdown">
							<button  class="dropdown-toggle btn btn-default" data-toggle="dropdown">Opsi <span class="fa fa-caret-down"></span></button>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url()."packages/detail?q=".$data['url'] ?>" target="_blank">Lihat</a></li>
								<li><a href="">Detail</a></li>
								<li><a href="">Edit</a></li>
							</ul>
						</td>
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