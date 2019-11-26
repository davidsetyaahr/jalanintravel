<?php 
	include "sidebar-user.php";
?>
<div class="col-md-9 user-right">
	<div class="row">
		<?php 
			if(isset($_GET['msg'])){
				echo "<div class='col-md-12'><div class='alert alert-success'><b>$_GET[msg]</b></div></div>";
			}
		?>
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<td>#</td>
							<td>Packages Name</td>
							<td>Duration</td>
							<td>Departure</td>
							<td>Transportation</td>
							<td>Status</td>
							<td>Opsi</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql = get("select c.custom_id,c.title,d.duration_time,c.departure,a.accommodation_name,c.status from custom_packages c join durations d on c.duration_id = d.duration_id join accommodations a on c.trans_id = a.accommodation_id where c.user_id = '".$_SESSION['user_id']."' order by c.custom_id desc ");
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
</div>
<?php 
	include "slash-sidebar-user.php";
?>
