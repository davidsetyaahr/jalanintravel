<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-map-marker";
	$panel['title'] = "Destinasi";
	$panel['subtitle'] = "Destinasi Wisata / Daftar Destinasi Wisata";
	
	/* nambah ini */
	//add-destination = link yg dituju
	//Destinasi = text di link
	//add = tipe (add/view)
	$panel['btn'] = btn_admin("add-destination","Destinasi","add");
	$title = "Destinations | View Destinations";

	/* nambah ini */

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Destinasi Wisata</td>
						<td>Kota</td>
						<td>Kategori</td>
						<td>Url</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no = 0;
					$dest = get("select d.destination_id, d.destination_name, c.city_name, d.url, ct.category_name from destinations d join city c on d.city_id = c.city_id join categories ct on d.category_id = ct.category_id order by d.destination_id desc");
					foreach ($dest as $dest) {
						$no++;
				?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $dest['destination_name'] ?></td>
					<td><?php echo $dest['city_name'] ?></td>
					<td><?php echo $dest['category_name'] ?></td>
					<td><?php echo $dest['url'] ?></td>
					<td class="dropdown">
						<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Opsi <span class="fa fa-caret-down"></span></button>
						<ul class="dropdown-menu">
							<li><a target="_blank" href="<?php echo base_url()."destinations/detail?q=".$dest['url'] ?>">Lihat</a></li>
							<li><a href="<?php echo base_url()."admin/destinations/edit-destination?q=".$dest['destination_id'] ?>">Edit</a></li>
						</ul>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>