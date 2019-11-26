<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-cart";
	$panel['title'] = "Pemesanan";
	$panel['subtitle'] = "Pemesanan / Data Pemesanan";
	$panel['btn'] = "";
	$title = "Pemesanan | Add Pemesanan";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<td>#</td>
					<td>Kode</td>
					<td>Paket Tour</td>
					<td>Tgl Tour</td>
					<td>Tgl Pemesanan</td>
					<td>Status</td>
					<td>Opsi</td>
				</tr>
				</thead>
				<tbody>
					<?php 
					$sql = get("select bp.kode_booking_package, bp.booking_date, p.package_name, d.duration_time, bp.start_tour, bp.payment_option, bp.status from booking_package bp join packages p on bp.package_id = p.package_id join durations d on p.duration_id = d.duration_id order by bp.kode_booking_package desc");
					$no=0;
					foreach ($sql as $data) {
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
