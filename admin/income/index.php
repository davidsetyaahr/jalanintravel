<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-database";
	$panel['title'] = "Pemasukan";
	$panel['subtitle'] = "Pemasukan / Data Pemasukan";
	$panel['btn'] = "";
	include "../common/panel.php";
	$title = "Pemasukan | Data Pemasukan";
	$where = "";
	if(isset($_GET['filter'])){
		if($_GET['filter']=="day"){
			$start = date("Y-m-d 00:00:00");
			$end = date("Y-m-d 23:59:00");
			$where = "where tgl_bayar between '$start' and '$end'";
		}
		else if($_GET['filter']=="week"){
			$date = date("Y-m-d");
			$tgl = substr($date, 8,2);
			$bln = substr($date, 5,2);
			$thn = substr($date, 0,4);

			$monthstart = date("Y-m-1 00:00");
			$daystart = date("Y-m-d 00:00");
			$dayend = date("Y-m-d 23:59");
			$jd = gregoriantojd( $bln, $tgl, $thn );
			$dw = jddayofweek( $jd ); //0 = Minggu
			$ref_date = strtotime( "$bln/$tgl/$thn" );
			$tanggal_awal_minggu = date( 'Y-m-d 00:00', jdtounix($jd - $dw) );
			$tanggal_referensi = date( 'Y-m-d H:i:s');
			$tanggal_akhir_minggu = date( 'Y-m-d 23:59', jdtounix($jd - $dw + 6) );

			$where = "where tgl_bayar between '$tanggal_awal_minggu' and '$tanggal_akhir_minggu'";
		}
		if($_GET['filter']=="month"){
			$start = date("Y-m-1 00:00:00");
			$end = date("Y-m-d 23:59:00");
			$where = "where tgl_bayar between '$start' and '$end'";
		}
	}
	$ttl = get("select sum(nominal) ttl from payment $where");
	$in = get("select * from payment $where order by payment_id desc");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<a href="?filter=day" class="btn btn-default">Pemasukan Hari Ini</a>
				&nbsp;
				<a href="?filter=week" class="btn btn-default">Pemasukan Minggu Ini</a>
				&nbsp;
				<a href="?filter=month" class="btn btn-default">Pemasukan Bulan Ini</a>
			</div>
			<div class="col-md-4">
				<h3 style="margin-top: 0">Total : <?php echo "Rp. ".number_format($ttl[0]['ttl'],0,',','.'); ?></h3>
			</div>
		</div>
		<div class="row">
			<br>
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<td>#</td>
								<td>Sumber</td>
								<td>Tanggal</td>
								<td>Nominal</td>
							</tr>
						</thead>
						<tbody>
							<?php 
							$n = 0;
							foreach ($in as $value) {
							$n++;
							?>
							<tr>
								<td><?php echo $n ?></td>
								<td><?php echo $value['kode_booking_package'] ?></td>
								<td><?php echo tanggalindo($value['tgl_bayar'],1) ?></td>
								<td><?php echo "Rp. ".number_format($value['nominal'],0,',','.') ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>