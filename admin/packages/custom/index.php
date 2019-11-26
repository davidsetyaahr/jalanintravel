<?php 
	include "../../common/top.php";
	$panel['icon'] = "lnr lnr-star";
	$panel['title'] = "Custom Tour";
	$panel['subtitle'] = "Custom Tour / Data Pemesanan";
	$panel['btn'] = "";
	$title = "Custom Tour | Data Pemesanan";

	include "../../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Nama Trip</td>
						<td>Durasi</td>
						<td>Keberangkatan</td>
						<td>Transportasi</td>
						<td>User</td>
						<td>Status</td>
						<td>Opsi</td>
					</tr>
				</thead>
					<tbody>
						<?php 
							$sql = get("select c.custom_id,c.title,d.duration_time,c.departure,a.accommodation_name,c.status,u.first_name,u.last_name from custom_packages c join durations d on c.duration_id = d.duration_id join accommodations a on c.trans_id = a.accommodation_id join users u on c.user_id = u.user_id order by c.custom_id desc ");
							$no = 0;
							foreach ($sql as $data) {
								$no++;
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['title'] ?></td>
							<td><?php echo $data['duration_time'] ?> Hari</td>
							<td><?php echo tanggalindo(date("D Y-m-d H:i:s",strtotime($data['departure'])),2) ?></td>
							<td><?php echo $data['accommodation_name'] ?></td>
							<td><?php echo $data['first_name']." ".$data['last_name'] ?></td>
							<td>
								<?php 
									if($data['status']=="0"){
										echo "<b class='error'>Pending</b>";
									}
									else if($data['status']=="1"){
										echo "<b class='color-green'>Berhasil</b>";
									}
								?>
							</td>
					<td class="dropdown">
						<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Opsi <span class="fa fa-caret-down"></span></button>
						<ul class="dropdown-menu">
							<li><a href="detail-custom-tour?q=<?php echo $data['custom_id'] ?>">Detail</a></li>
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
	include "../../common/slash-panel.php";
	include "../../common/bottom.php";
?>
