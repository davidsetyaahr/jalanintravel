<?php 
	$title = "Jalanin | Packages";
	$top['first'] = "Tour Package";
	$top['second'] = "List Tour Package";
	include "../common/top.php";
	$key = isset($_GET['key']) ? "where p.package_name like '%$_GET[key]%' " : "";
	$data = get("SELECT p.package_id,p.package_name,d.duration_time,p.tour_styles_id,p.img,p.overview,p.min_pax,p.max_pax,p.url,p.sale from packages p join durations d on p.duration_id = d.duration_id $key");

?>

  <div class="container custom">
    <div class="first-content">
      <span class="first"><?php echo $top['first'] ?></span> 
      <span class="second color-green"> > </span>
      <span class="third color-green"> <?php echo $top['second'] ?> </span>
    </div>
  </div>
  <div class="container-fluid">
      <div class="row" style="background: #f6f6f6">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <br>
              <br>
              <br>
              <br>
              <h1 class="color-blue"><b>Customize Tour Package?</b></h1>
              <div class="text-custom">In this feature you can more freely prepare your vacation, starting from a tourist destination, the schedule during the trip takes place, the start and end time of the tour, all of you in control </div>
              <br>
                <a href="<?php echo base_url()."packages/custom" ?>" class="btn btn-custom green">Want It</a>
                &nbsp;
                <a href="" class="btn btn-custom blue scroll-package" style="font-weight: normal">Regular Package</a>
                <br>
                <br>
            </div>
          </div>
        </div>
        <div class="col-md-7" style="padding-right:0">
          <img src="<?php echo base_url() ?>assets/img/common/done.jpg" class="img-responsive">
        </div>
      </div>
  </div>

<div class="bg-grey" style="background: #f6f6f6">
<div class="container custom">
	<div class="row next-content">
		<div class="col-md-3">
			<div class="filter-packages">
				<center>
					<span class="title">Filter Tour Package</span>
				</center>
			</div>
			<div class="filter-packages">
				<div class="search">
					<form action="" method="">
						<input type="text" name="key" class="form-control text input-bbottom" name="" value="<?php echo isset($_GET['key']) ? $_GET['key'] : "" ?>" placeholder="Cari Package Disini..">
						<button type="submit"><span class="fa fa-search"></span></button>
					</form>
				</div>
				<form>
				<div class="filter-title">Trip Categories</div>
				<div class="input-checkbox">
					<ul>
						<?php 
							$cat = get("select * from categories");
							$c = 0;
							foreach ($cat as $cat) {
								$c++;
						?>
						<li>
							<label for="cat<?php echo $c; ?>"><?php echo $cat['category_name'] ?></label>
							<input type="checkbox" class="check" name="category_id" id="cat<?php echo $c; ?>">
						</li>
						<?php
							}
						?>
					</ul>
				</div>
				<div class="filter-title">Tour Style</div>
				<div class="input-checkbox">
					<ul>
						<?php 
							$ts = get("select * from tour_style");
							$t = 0;
							foreach ($ts as $ts) {
								$t++;
						?>
						<li>
							<label for="ts<?php echo $t; ?>"><?php echo $ts['tour_style_name'] ?></label>
							<input type="checkbox" class="check" name="ts_id" id="ts<?php echo $t; ?>">
						</li>
						<?php
							}
						?>
					</ul>
				</div>
				<div class="filter-title">Trip Durations</div>
				<div class="input-checkbox">
					<ul>
						<?php 
							$dur = get("select * from durations");
							$d = 0;
							foreach ($dur as $dur) {
								$d++;
						?>
						<li>
							<label for="dur<?php echo $d ?>">Tour Package <?php echo $dur['duration_time'] ?> Day</label>
							<input type="checkbox" class="check" name="duration_id[]" id="dur<?php echo $d; ?>">
						</li>
						<?php
							}
						?>
					</ul>
				</div>
				<button class="btn btn-success btn-block" type="submit">Filter</button>
			</form>
			</div>
		</div>
		<div class="col-md-9">
			<div class="filter-packages">
				<div class="row">
					<div class="col-md-8">
						<i class="fa fa-globe color-green fa-lg" style="font-size: 40px"></i>
						<h3 style="display: inline" class="color-blue"> Tour Package</h3>
						<hr>
						<b>Total : <?php echo count($data); ?> Tour Package</b>
					</div>
					<div class="col-md-4">
						<b class="pull-right mb-10"><span class="color-green"> Show:</span> by</b>
						<select class="form-control input radius0">
							<option value="">New Packages</option>
							<option value="">Most Booking</option>
						</select>
					</div>
				</div>
			</div>
			<?php
				foreach ($data as $data){
			?>
			<div class="the-packages">
				<div class="row">
					<div class="col-md-4">
			          <div class="packages">
			            <div class="image">
			              <div class="city">
			                    <img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
								<span class="city"><span id="jalan" class="jalan">#1 - </span><span class="in">TERBARU</span></span>
			              </div>
			              <div class="layer"></div>
			              <img src="<?php echo base_url()."assets/img/destinations/".$data['img'] ?>" class="img-responsive img-destinations transition05">
			            </div>
			          </div>
					</div>
					<div class="col-md-8">
						<div class="row desc">
							<?php 
								if($data['sale']>0){
							?>
							<div class="sale">
								Diskon <?php echo $data['sale'] ?>%
							</div>
							<?php									
								}
							?>
							<div class="col-md-12">
								<div class="title"><?php echo $data['package_name'] ?></div>
							</div>
							<div class="col-md-12">
								<div class="row grid">
									<div class="col-md-4 border left">
										<?php echo substr($data['overview'],0,110)." [....]" ?>
									</div>
									<div class="col-md-4 border center">
										<div class="descript">
											<span class='color-blue'>Durasi Tour : </span> <span class="color-green"><?php echo $data['duration_time'] ?> Day</span>
										</div>
										<div class="descript">
											<span class='color-blue'>Min PAX : </span> <span class="color-green"><?php echo $data['min_pax'] ?> PAX</span>
										</div>
										<div class="descript">
											<span class='color-blue'>Max PAX : </span> <span class="color-green"><?php echo $data['max_pax'] ?> PAX</span>
										</div>
						              <div class="tag-img">
						              	<?php 
						              		$ex = explode(",", $data['tour_styles_id']);
						              		for($i=0;$i<count($ex);$i++){
						              		$img = get("select * from tour_style where tour_style_id = '$ex[$i]'");
						              		foreach ($img as $img) {
						              	?>
						                <img src="<?php echo base_url()."assets/img/tour-style/".$img['icon']; ?>" class="img-responsive" data-toggle="tooltip" title="<?php echo $img['tour_style_name'] ?>">
						                <?php 
						              		}
						                	}
						                ?>
						              </div>
									</div>
									<div class="col-md-4 right">
										<div class="price">
											<span class="color-blue"><span class="color-green">Harga Mulai Dari : </span>
												<?php 
									            $minPrice = min_price($data['package_id'])['price'];
									            $sale = min_price($data['package_id'])['sale'];
									            if($sale!=0){
									              echo "<span class='color-blue'><del>Rp. ".number_format($minPrice,0,',','.')."</del>";
									              echo "- <small style='color:red'>Diskon ".$sale."%</small>";
									            }
									            else{
									            echo "<span class='color-blue'>Rp. ".number_format($minPrice,0,',','.')."</span>";
									            }
													?>
												</span> / Pax</small>
	 								       <a href="<?php echo base_url()."packages/detail?q=".$data['url'] ?>" class="btn btn-custom green btn-block">Detail</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="next-content"></div>
</div>
</div>
<?php 
	include "../common/bottom.php";
?>