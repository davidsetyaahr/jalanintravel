<?php 
	include "../common/top.php";
	if(isset($_GET['notif_id'])){
		update("notif_admin",["view = '1'"],"where notif_id = '$_GET[notif_id]'");
	}
	$panel['icon'] = "lnr lnr-cart";
	$panel['title'] = "Pemesanan";
	$panel['subtitle'] = "Pemesanan / Data Pemesanan";
	$panel['btn'] = btn_admin("index","Lihat Data","view");
	$title = "Peesanan | Add Pemesanan";
	include "../common/panel.php";
	$data = get("select bp.attachment,bp.kode_booking_package, bp.booking_date, p.package_name, bp.sale,d.duration_time, bp.payment_option, bp.start_tour, bp.address_start, u.first_name, u.last_name, bp.status from booking_package bp join packages p on bp.package_id = p.package_id join durations d on p.duration_id = d.duration_id join users u on bp.user_id = u.user_id where bp.kode_booking_package = '$_GET[q]'");
	$list_pax = get("select sum(ttl) ttl from list_pax where kode_booking_package = '".$_GET['q']."'");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<label>Kode Booking</label>
				<input type="text" class="form-control" value="<?php echo $data[0]['kode_booking_package'] ?>" disabled>
			</div>
			<div class="col-md-6">
				<label>Paket Tour</label>
				<input type="text" class="form-control" value="<?php echo $data[0]['package_name']." - ".$data[0]['duration_time'] ?> Hari" disabled>
			</div>
			<div class="col-md-6">
				<br>
				<label>Nama Pemesan</label>
				<input type="text" class="form-control" value="<?php echo $data[0]['first_name']." ".$data[0]['last_name']  ?>" disabled>
			</div>
			<div class="col-md-6">
				<br>
				<label>Tanggal Tour</label>
				<input type="text" class="form-control" value="<?php echo tanggalindo(date("D Y-m-d",strtotime($data[0]['start_tour'])),2) ?>" disabled>
			</div>
			<div class="col-md-6">
				<br>
				<label>Alamat Penjemputan</label>
				<input type="text" class="form-control" value="<?php echo $data[0]['address_start'] ?>" disabled>
			</div>
			<div class="col-md-6">
				<br>
				<label>Total Biaya</label>
				<input type="text" class="form-control" value="<?php echo "Rp. ".number_format($list_pax[0]['ttl'] - ($data[0]['sale']*$list_pax[0]['ttl']/100),0,',','.') ?>" disabled>
			</div>
			<div class="col-md-6">
				<br>
				<label>Kekuragan</label>
				<?php 
					if($data[0]['payment_option']=="dp20"){
						$min = "Rp. ".number_format(($list_pax[0]['ttl'] - ($data[0]['sale']*$list_pax[0]['ttl']/100)) - (20 * ($list_pax[0]['ttl'] - ($data[0]['sale']*$list_pax[0]['ttl']/100))) / 100,0,',','.');
					}
					else if($data[0]['payment_option']=="full"){
						$min = 0;
					}
					else{
						$min = "Rp. ".number_format($list_pax[0]['ttl'] - ($data[0]['sale']*$list_pax[0]['ttl']/100),0,',','.');
					}
				?>
				<input type="text" class="form-control" value="<?php echo $min ?>" disabled>
			</div>
			<div class="col-md-6">
				<br>
				<label>Status</label>
					<?php 
						if($data[0]['status']==99)
							$status =  "Belum Terverifikasi";
						else if($data[0]['status']==0)
							$status =  "Booked";
						else if($data[0]['status']==1)
							$status =  "DP 20%";
						else if($data[0]['status']==11)
							$status =  "Upload (Menunggu Verifikasi)";
						else if($data[0]['status']==2)
							$status = "Pending";
						else if($data[0]['status']==3)
							$status = "Lunas";
					?>				
				<input type="text" class="form-control" value="<?php echo $status ?>" disabled>
			</div>
			<div class="col-md-12">
				<br>
				<label>Lampiran</label>
					<div class="thumbnail">
				<div class="row">
					<?php 
						$ex = explode(",", $data[0]['attachment']);
						foreach ($ex as $value) {
					?>
					<div class="col-md-3">
						<center>
							<img src="<?php echo base_url()."assets/img/attachment/$value" ?>" class="img-responsive">						
						</center>
					</div>
					<?php } ?>
				</div>
				</div>
			</div>
			<?php
					if($data[0]['status']!=99 && $data[0]['status']!=0){
						echo "<div class='col-md-12'><label>Bukti Pembayaran</label><br><div class='thumbnail'><div class='row'>";
						$bukti = get("select bukti from payment where kode_booking_package = '".$_GET['q']."'");
						foreach ($bukti as $value) {
					?>
					<div class="col-md-6">
						<br>
						<center>
							
						<img src="<?php echo base_url()."assets/img/payment/".$value['bukti'] ?>" class="img-responsive">
						</center>
					</div>
					<?php
						}
						echo "</div></div></div>";
					}
				if($data[0]['status']==99 || $data[0]['status']==11 || $data[0]['status']==2){
			?>
			<div class="col-md-12">
				<center>
					<?php 
						if($data[0]['status']==2){
					?>
					<a href="set-guide?kode=<?php echo $_GET['q'] ?>" class='btn btn-success'>Terima / Approve & Pilih Tour Guide</a>
					<?php
						}
						else{
					?>
					<a href="approve.php?kode=<?php echo $_GET['q'] ?>&from=<?php echo $data[0]['status'] ?>" class='btn btn-success'>Terima / Approve</a>
					<?php 
					}
					if($data[0]['status']==99){
					?>
					<a href="reject.php?kode=<?php echo $_GET['q'] ?>&from=<?php echo $data[0]['status'] ?>" class='btn btn-danger'>Tolak / Reject</a>
					<?php } ?>
				</center>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>
