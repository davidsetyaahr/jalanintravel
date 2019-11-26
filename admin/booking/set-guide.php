<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-user";
	$panel['title'] = "Wisata";
	$panel['subtitle'] = "Pemandu Wisata / Data Pemandu Wisata";
	$panel['btn'] = btn_admin("../tour-guide/view-tour-guide","Lihat Data","view");
	$title = "Tour Guide | Pilih Tour Guide";
	include "../common/panel.php";
	$package = get("select bp.start_tour, d.duration_time from booking_package bp join packages p on bp.package_id = p.package_id join durations d on p.duration_id = d.duration_id where bp.kode_booking_package = '$_GET[kode]'");
	$start = $package[0]['start_tour'];
	$end = date("Y-m-d", strtotime($package[0]['start_tour']."+ ".$package[0]['duration_time']." days"));
	$loopPackage = get("select bp.start_tour, d.duration_time, bp.tour_guide_id from booking_package bp join packages p on bp.package_id = p.package_id join durations d on p.duration_id = d.duration_id where bp.kode_booking_package != '".$_GET['kode']."' and status = 3 ");
	$idGuide = [];
	foreach ($loopPackage as $key => $value) {
		$endTour = date("Y-m-d", strtotime($value['start_tour']."+ ".$value['duration_time']." days"));
		if($start >= $value['start_tour'] && $start <= $endTour || $end >= $value['start_tour'] && $end <= $endTour){
			array_push($idGuide, $value['tour_guide_id']);
		}
	}
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<?php 
			if(isset($_GET['error'])){
				echo "<div class='alert alert-danger'><b>Silahkan Pilih Pemandu Wisata</b></div>";
			}
		?>
			<form action="act-set-guide" method="post">
				<input type="hidden" name="kode" value="<?php echo $_GET['kode'] ?>">
		<div class="row">
			<?php 
				if(count($idGuide)==0){
					$guide = get("select * from tour_guide order by tour_guide_id desc");
					$n = 0;
					foreach ($guide as $guide) {
						$date = date("Y-m-d");
						$ex = get("select count(tour_guide_id) ttl from booking_package where tour_guide_id = '$guide[tour_guide_id]' and start_tour <= '$date'");
						?>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-4">
									<img src="<?php echo base_url()."assets/img/tour-guide/".$guide['photo'] ?>" class="img-responsive img-rounded thumbnail" style="height: 100px">
								</div>
								<div class="col-md-8">
									<b><?php echo $guide['tour_guide_name'] ?></b>
									<p>
										<?php echo empty($ex[0]['ttl']) ? 0 : $ex[0]['ttl'] ?> x memandu wisata
										<br>Rp <?php echo number_format($guide['Tarif'],0,',','.') ?> / Trip</p>
											<hr style="margin-top:0;margin-bottom: 6px">
											<input type="radio" id="radio<?php echo $n ?>" name="tour_guide_id" value="<?php echo $guide['tour_guide_id'] ?>">
											<label style="cursor: pointer;" for='radio<?php echo $n ?>'>Pilih Pemandu Wisata</label>
								</div>
							</div>
							<br>
						</div>
						<?php
						$n++;
					}
				}
				else{
							
				}
			?>
		</div>
		<?php echo btn_add() ?>
		</form>
	</div>
</div>
<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>
