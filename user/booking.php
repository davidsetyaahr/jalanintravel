<?php 
	include "sidebar-user.php";
	$img = get("select * from users where user_id = '".$_SESSION['user_id']."' ");
	$booking = get("select bp.kode_booking_package, bp.booking_date, p.package_name, d.duration_time, bp.start_tour, bp.payment_option, bp.status from booking_package bp join packages p on bp.package_id = p.package_id join durations d on p.duration_id = d.duration_id where bp.user_id = '".$_SESSION['user_id']."' order by bp.kode_booking_package desc");
?>
<div class="col-md-9 user-right">
	<?php 
		if(isset($_GET['msg'])){
			echo "<div class='alert alert-success'>$_GET[msg]</div>";
		}
	?>
	<div class="box-border">
		<a href="" class="pull-right hidethis" data-hide=".box-border">x</a>
		<b>Note:</b>
		<p>Make a payment in 24 hours, Booking will be deleted automatically within 24 hours of not making payment. Thank you</p>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Kode</td>
					<td>Tour Package</td>
					<td>Tour Date</td>
					<td>Booking Date</td>
					<td>Status</td>
					<td>Options</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=0;
					foreach ($booking as $data) {
						$no++;
				?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $data['kode_booking_package'] ?></td>
					<td><?php echo substr($data['package_name'],0,13)."..." ?></td>
					<td><?php echo tanggalindo(date("D Y-m-d",strtotime($data['start_tour'])),2) ?></td>
					<td><?php echo tanggalindo(date("D Y-m-d H:i:s",strtotime($data['booking_date'])),2)." WIB" ?></td>
					<td><?php
						if($data['status']==99)
							echo "<b class='color-orange'>Menunggu Verifikasi</b>";
						else if($data['status']==0)
							echo "<b class='error'>Booked</b>";
						else if($data['status']==1)
							echo "<b class='color-grey'>DP 20%</b>";
						else if($data['status']==11)
							echo "<b class='color-grey'>Upload</b>";
						else if($data['status']==2)
							echo "<b class='color-blue'>Pending</b>";
						else if($data['status']==3)
							echo "<b class='color-green'>Lunas</b>";
					?></td>
					<td class="dropdown">
						<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Opsi <span class="fa fa-caret-down"></span></button>
						<ul class="dropdown-menu">
							<li><a href="detail-booking?q=<?php echo $data['kode_booking_package'] ?>">Detail</a></li>
					<?php 
						if($data['status']==0 || $data['status']==1){
								if($data['status']=="0"){
							?>
								<li><a href="payment?q=<?php echo $data['kode_booking_package'] ?>">Pembayaran</a></li>
							<?php
								}
								else{
							?>
								<li><a href="repayment?q=<?php echo $data['kode_booking_package'] ?>">Pelunasan</a></li>
							<?php
								} }
							?>
						</ul>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php 
	include "slash-sidebar-user.php";
?>
