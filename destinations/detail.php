<?php 
	include "../common/top.php";
	$top['first'] = "";
	$top['second'] = "";
	$title = "Jalanin | Destinations";
	$dest = get("select d.destination_id, d.destination_name, d.map, d.tour_styles_id, d.overview, d.img, d.information,c.city_name, prov.province_name, d.url, ct.category_name,ct.icon icon_cat from destinations d join city c on d.city_id = c.city_id join province prov on c.province_id = prov.province_id join categories ct on d.category_id = ct.category_id where d.url = '$_GET[q]' ");
	$img = explode(",", $dest[0]['img']);
	$str = strlen($dest[0]['destination_name']);
	$len = $str-3;
	$nameOne = substr($dest[0]['destination_name'], 0,$len);
	$nameTwo = substr($dest[0]['destination_name'], $len,$len+3);
	$ts = explode(",", $dest[0]['tour_styles_id']);
//	$nameOne = $len-2;
?>
<div class="banner">
 <img src="<?php echo base_url()."assets/img/destinations/".$img[0] ?>" class="img-responsive">
  <div class="layer">
    <div class="text">
      <div class="top">
      	<center>
      	<img src="<?php echo base_url()."assets/img/category/".$dest[0]['icon_cat']; ?>" class="img-cat">
      	</center>
        <span class="jalan-before"><?php echo $nameOne ?></span><span class="in"><?php echo $nameTwo ?></span>
      </div>
      <div class="bottom">
      		Jalanin Travel
      	<span class="fa fa-chevron-down"></span>
      </div>
    </div>
  </div>
</div>
<div class="bg-grey">
	<div class="container custom">
		<div class="row next-content">
			<div class="col-md-10 col-md-offset-1 overview">
				<div class="content-title">Overview</div>
				<i><b class="color-green"><?php 
					for($t=0;$t<count($ts);$t++){
						$getTs = get("select tour_style_name from tour_style where tour_style_id = '".$ts[$t]."' ");
						$slash = ($t==(count($ts)-1)) ? "" : " / ";
						echo $getTs[0]['tour_style_name'].$slash;
					}
				 ?></b></i>
				<p><?php echo $dest[0]['overview'] ?></p>
				<b><?php echo $dest[0]['city_name']." - ".$dest[0]['province_name'] ?></b>
			</div>
		</div>
		<div class="next-content"></div>
	</div>
</div>
<div class="container next-content">
	<div class="row">
		<?php 
			for($i=0;$i<count($img);$i++){
		?>
		<div class="col-md-3">
			<img src="<?php echo base_url()."assets/img/destinations/".$img[$i] ?>" class="img-responsive img-rounded">
			<br>
		</div>
	<?php } ?>
	</div>
</div>
<div class="map-frame">
	<iframe src="<?php echo $dest[0]['map'] ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="container-fluid next-content">
	<div class="row">
		<div class="col-md-6">
			<div class="quotes">
				<h3>Informasi Lainnya</h3>
				<br>
				<div class="destination-info">
					<?php echo $dest[0]['information'] ?>
				</div>
			</div>
		</div>			
		<div class="col-md-6">
			<div class="quotes">
			<h3>Paket Wisata</h3>
			<br>
			<?php 
				$data = get("SELECT p.package_id,p.package_name,d.duration_time,p.tour_styles_id,p.img,p.overview,p.min_pax,p.max_pax,p.url from packages p join durations d on p.duration_id = d.duration_id join package_detail pd on pd.package_id = p.package_id join itinerary i on i.detail_package_id = pd.detail_package_id where i.destination_id = '".$dest[0]['destination_id']."' group by p.package_id");
				foreach ($data as $data) {

			?>
			<a href="<?php echo base_url()."packages/detail?q=".$data['url'] ?>">
			<div class="the-packages">
				<div class="row">
					<div class="col-md-5">
			          <div class="packages">
			            <div class="image">
			              <div class="city">
			                    <img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
								<small><span class="city"><span id="jalan" class="jalan">#1 - </span><span class="in">TERBARU</span></span></small>
			              </div>
			              <div class="layer"></div>
			              <img src="<?php echo base_url()."assets/img/destinations/".$data['img'] ?>" class="img-responsive img-destinations transition05">
			            </div>
			          </div>
					</div>
					<div class="col-md-7">
						<div class="row desc">
							<div class="col-md-12">
								<div class="title"><?php echo $data['package_name'] ?> (<?php echo $data['duration_time']." Hari" ?>)</div>
							</div>
							<div class="col-md-12">
								<div class="row grid">
									<div class="col-md-7 border left">
										<?php echo substr($data['overview'],0,70)." [....]" ?>
									</div>
									<div class="col-md-5 right">
										<div class="price">
											<small class="color-blue"><span class="color-green">Harga Mulai : </span>
												<?php 
									            $minPrice = min_price($data['package_id'])['price'];
									            $sale = min_price($data['package_id'])['sale'];
									            if($sale!=0){
									              echo "<span class='color-blue'><del>Rp. ".number_format($minPrice,0,',','.')."</del></span>";
									              echo "- <small style='color:red'>Diskon ".$sale."%</small>";
									            }
									            else{
									            echo "<span class='color-blue'>Rp. ".number_format($minPrice,0,',','.')."</span>";
									            }
													?>
												/ Pax</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<?php } ?>
		<center>
		<a href="../packages" class="btn btn-custom green">Lebih Banyak</a>
		</center>
			</div>
		</div>
	</div>
</div>
<div class="container next-content">
	<h3 class="color-blue text-center"><b>Destinasi Lainnya</b></h3>
	<br>
	<div class="row">
      <?php 
      $dest = get("select d.destination_name, c.city_name, d.img, d.url from destinations d join city c on d.city_id = c.city_id order by d.destination_id desc");
      $no = 0;
      foreach ($dest as $d) {
        $no++;
            $img = explode(",", $d['img']);
      ?>        
        <div class="col-md-4">
          <a href="<?php echo base_url()."destinations/detail?q=".$d['url'] ?>">
          <div class="destinations-img">
            <div class="layer">
              <div class="trap">
                <img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
                <p>
                <span id="jalan" class="jalan">#<?php echo $no ?> - </span><span class="in"><?php echo $d['city_name'] ?></span>
              </p>
              </div>

            </div>
            <img src="<?php echo base_url()."assets/img/destinations/".$img[0] ?>" class="img-responsive transition05">
            <div class="bottom"><center><span><?php echo $d['destination_name'] ?></span></center></div>
          </div>
        </a>
        </div>
      <?php } ?>
	</div>
</div><?php 
	include "../common/bottom.php";
?>