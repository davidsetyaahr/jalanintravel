<?php 
	include "sidebar-user.php";
	$booking = get("select bp.kode_booking_package, bp.sale, p.img, p.package_name, bp.price_id, d.duration_time, bp.start_tour from booking_package bp join packages p on bp.package_id = p.package_id join durations d on p.duration_id = d.duration_id where bp.kode_booking_package = '$_GET[q]' ");
	$list_pax = get("select sum(ttl) ttl from list_pax where kode_booking_package = '".$booking[0]['kode_booking_package']."'");
?>
<div class="col-md-9 user-right">
	<div class="row">
		<div class="col-md-4">
				<center>
					<img src="<?php echo base_url()."assets/img/destinations/".$booking[0]['img'] ?>" class="img-responsive img-rounded mb-10">
				</center>
		</div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td><b>Booking Code</b></td>
						<td>:</td>
						<td><?php echo $booking[0]['kode_booking_package'] ?></td>
					</tr>
					<tr>
						<td><b>Tour Package</b></td>
						<td>:</td>
						<td><?php echo $booking[0]['package_name'] ?></td>
					</tr>
					<tr>
						<td><b>Duration</b></td>
						<td>:</td>
						<td><?php echo $booking[0]['duration_time']." Hari" ?></td>
					</tr>
					<tr>
						<td><b>Tour Date</b></td>
						<td>:</td>
						<td><?php echo tanggalindo($booking[0]['start_tour'],1) ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<hr>
	<?php 
		if(isset($_GET['error'])){
			echo "<div class='alert alert-danger'>$_GET[error]</div>";
		}
	?>
	<label>Payment Method</label>
	<select class="form-control input-bbottom radius0" id="select-opt-payment">
		<option value="">---Select---</option>
		<option value="dp20">DP 20%</option>
		<option value="full">Full 100%</option>
	</select>
	<div class="row" id="full">
		<br>
		<div class="col-md-6">
			<label>Total cost</label>
			<div class="input-wcheck">
			<input type="text" style="background:white" class="form-control input-bbottom radius0" name="" value="<?php echo "Rp. ".number_format($list_pax[0]['ttl'] - ($booking[0]['sale']*$list_pax[0]['ttl']/100),0,',','.') ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>

			</div>
		</div>
		<div class="col-md-6">
			<label>Lack</label>
			<div class="input-wcheck">
				<input type="text" style="background: white" class="form-control input-bbottom radius0" name="" value="<?php echo "Rp. ".number_format($list_pax[0]['ttl'] - ($booking[0]['sale']*$list_pax[0]['ttl']/100),0,',','.') ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>				
			</div>
		</div>
	</div>
	<div class="row" id="dp">
		<br>
		<div class="col-md-4">
			<label>Total Cost</label>
			<div class="input-wcheck">
				<input type="text" style="background: white" class="form-control input-bbottom radius0" name="" value="<?php echo "Rp. ".number_format($list_pax[0]['ttl'] - ($booking[0]['sale']*$list_pax[0]['ttl']/100),0,',','.') ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>
			</div>
		</div>
		<div class="col-md-4">
			<label>DP 20%</label>
			<div class="input-wcheck">
				<input type="text" style="background: white" class="form-control input-bbottom radius0" name="" value="<?php echo "Rp. ".number_format(20 * ($list_pax[0]['ttl'] - ($booking[0]['sale']*$list_pax[0]['ttl']/100)) / 100,0,',','.') ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>				
			</div>
		</div>
		<div class="col-md-4">
			<label>Lack</label>
			<div class="input-wcheck">
				<input type="text" style="background: white" class="form-control input-bbottom radius0" name="" value="<?php echo "Rp. ".number_format(($list_pax[0]['ttl'] - ($booking[0]['sale']*$list_pax[0]['ttl']/100)) - (20 * ($list_pax[0]['ttl'] - ($booking[0]['sale']*$list_pax[0]['ttl']/100))) / 100,0,',','.') ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>				
			</div>
		</div>
	</div>
	<div class="row">
		<br>
	  	<?php 
	  		$bank = get("select * from bank_option");
	  		foreach ($bank as $bank) {
	  	?>
	  			<div class="col-md-3">
	  				<div class="box-border text-center">
		  				<img src="<?php echo base_url()."assets/img/bank-option/".$bank['logo'] ?>" class="img-responsive">
		  				<br>
		  				<div class="bbottom-dotted"></div>
		  				<br>
		  				<b class="color-blue"><?php echo $bank['rekening_number'] ?></b>
		  				<br>
		  				<div class="color-grey">(<?php echo $bank['fullname'] ?>)</div>
	  				</div>
	  			</div>
	  	<?php } ?>
	</div>
	<div class="row">
		<br>
		<div class="col-md-12">
			<div class="row box-border">
				<div class="col-md-6 col-md-offset-3">
					<center>
						<?php 
							if(isset($_GET['errorfile'])){
								echo "<div class='alert alert-danger'>$_GET[errorfile]</div>";
							}
						?>
						<form action="../booking/payment.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="kode_booking" value="<?php echo $_GET['q'] ?>">
						<input type="hidden" name="payment_option" id="payment_option">
						<label>Upload proof of payment</label>
						<input type="file" name="bukti" class="form-control">
						<br>
						<button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Upload</button>
						<button type="reset" class="btn btn-default"><span class="fa fa-trash"></span> Reset</button>
						</form>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include "slash-sidebar-user.php";
?>