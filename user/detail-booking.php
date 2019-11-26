<?php 
	include "sidebar-user.php";
	$booking = get("select p.tour_styles_id,bp.address_start,p.overview,bo.img img_branch,bo.address,bo.phone_number,c.city_name,pr.province_name, bp.kode_booking_package,h.hotel_name,bp.tour_guide_id, p.url,rh.room_type,pp.day_departure,pp.time_departure,ac.accommodation_name, p.img, p.package_name, bp.sale, bp.price_id, d.duration_time, bp.start_tour from booking_package bp join packages_price pp on bp.price_id = pp.price_id join accommodations ac on pp.accommodation_id = ac.accommodation_id join branch_office bo on pp.office_id = bo.office_id join city c on bo.city_id = c.city_id join province pr on c.province_id = pr.province_id join packages p on bp.package_id = p.package_id join room_hotel rh on p.room_hotel_id = rh.room_hotel_id join hotels h on rh.hotel_id = h.hotel_id join durations d on p.duration_id = d.duration_id where bp.kode_booking_package = '".$_GET['q']."'");
	$list_pax = get("select sum(ttl) ttl, sum(pax) pax from list_pax where kode_booking_package = '".$booking[0]['kode_booking_package']."'");
?>
<div class="col-md-9 user-right">
  				<div class="itinerary" style="margin-top: 0">
	  				<div class="top">
	  					<img class="transition05"  src="<?php echo base_url()."assets/img/destinations/".$booking[0]['img'] ?>">
	  					<div class="layer"></div>
	  					<div class="text"><span><?php echo $booking[0]['package_name'] ?></span></div>
	  				</div>
	  				<div class="row middle">
	  					<div class="col-md-1 day">
	  						<?php echo $list_pax[0]['pax']."<br>" ?>
		  						PAX
	  					</div>
	  					<div class="col-md-8">
		  					<div class="desc">
		  						<p>Tour : </p>
		  						<h5 class="color-grey"> - Package <?php echo $booking[0]['duration_time']." Hari"; ?></h5>
		  						<h5 class="color-grey mb-25"> - Start from <?php echo tanggalindo(date("D Y-m-d", strtotime($booking[0]['start_tour'])),2); ?></h5>
		  						<p>Departure : </p>
		  						<h5 class="color-grey"> - <?php
		  						$dayDep = explode("-", $booking[0]['day_departure']);

		  						if($dayDep[1]==0){
		  							echo tanggalindo(date("D Y-m-d", (strtotime($booking[0]['start_tour']))), 2);
		  						}
		  						else{
		  							echo tanggalindo(date("D Y-m-d", strtotime($booking[0]['start_tour']."- ".$dayDep[1]." days")), 2);
		  						}
		  						echo substr($booking[0]['time_departure'], 0,5)." WIB";
		  						?></h5>
		  						<h5 class="color-grey mb-25"> - <?php echo $booking[0]['accommodation_name'] ?></h5>
		  						<p>Hotel</p>
		  						<h5 class="color-grey mb-25"><?php echo $booking[0]['hotel_name']." - ".$booking[0]['room_type']." Room" ?></h5>
			  					<p>Pick Up : </p>
		  						<h5 class="color-grey mb-25"><?php echo $booking[0]['address_start'] ?></h5>
		  						<p>Information Branch Office:</p>
		  						<h5 class="color-green"><?php echo $booking[0]['city_name']." - ".$booking[0]['province_name'] ?></h5>

			  						<h5 class="color-green mb-25"><span class="fa fa-phone"></span> <?php echo $booking[0]['phone_number'] ?> &nbsp; <span class="fa fa-map"></span> <?php echo $booking[0]['address'] ?></h5>
		  					</div>
	  					</div>
	  					<div class="col-md-3">
	  						<div class="right">
			  							<?php
			  								$ttl = 0;
			  								$ttlPax = 0;
			  								$loopList_pax = get("select ls.*, pc.name_pax_category from list_pax ls join pax_categories pc on ls.pax_category_id = pc.pax_category_id where kode_booking_package = '".$booking[0]['kode_booking_package']."' ");
				  							foreach ($loopList_pax as $pax) {
				  								$ttlPax = $ttlPax + $pax['pax'];
				  								$ttl = $ttl + $pax['ttl'];
			  							?>
			  							<div class="bbottom-dotted">
			  								<b>
											<?php echo $pax['name_pax_category']."(".$pax['pax'].")" ?>
											<br>
											<span style="float: right;" class="color-blue">
												<?php 
													echo "Rp. ".number_format($pax['ttl'],0,',','.');
												?>
											</span>
											</b>
											<br>
			  							</div>
			  							<br>
			  							<?php
			  							}
			  							?>
			  							<?php if($booking[0]['sale']>0){ ?>
			  							<div style="display: block;" class="category">
			  								<span class="error">Off <?php echo $booking[0]['sale']."%</span>"; echo "<span class='pull-right'>Rp. ".number_format($ttl - ($booking[0]['sale'] * $ttl /100),0,',','.')."</span>	" ?>
			  								<br>
			  								<br>
			  							</div>
			  						<?php } else{ ?>
			  							<div style="display: block;" class="category">
			  								<span class="color-green"><?php echo $ttlPax." Pax</span>"; echo "<span class='pull-right'>Rp. ".number_format($ttl,0,',','.')."</span>	" ?>
			  							</div>

			  						<?php } ?>

							    <div class="tag-img">
						              	<?php 
						              		$ex = explode(",", $booking[0]['tour_styles_id']);
						              		for($i=0;$i<count($ex);$i++){
						              		$img = get("select * from tour_style where tour_style_id = '$ex[$i]'");
						              		foreach ($img as $img) {
						              	?>
						                <img src="<?php echo base_url()."assets/img/tour-style/".$img['icon']; ?>" class="img-responsive" data-toggle="tooltip" data-placement="right" title="<?php echo $img['tour_style_name'] ?>">
						                <?php 
						              		}
						                	}
						                ?>
							    </div>
							   <br>
							   <img src="<?php echo base_url()."assets/img/branch-office/".$booking[0]['img_branch'] ?>" class="img-responsive img-rounded">
							   <br>
							   <a class="color-blue bbottom-dotted" href="<?php echo base_url()."packages/detail?q=".$booking[0]['url'] ?>" target="_blank"><b>See the <span class="color-green">schedule </span></b></a>
	  						</div>
	  					</div>
	  				</div>
	  				<hr>
	  				<?php 
	  					if($booking[0]['tour_guide_id']!=0){
	  						$guide = get("select * from tour_guide where tour_guide_id = '".$booking[0]['tour_guide_id']."'");
	  				?>
	  				<div class="row">
	  					<div class="col-md-4">
	  						<img src="<?php echo base_url()."assets/img/tour-guide/".$guide[0]['photo'] ?>" class="img-responsive img-rounded">
	  					</div>
	  					<div class="col-md-8">
	  						<b class="color-blue">Tour Guide - <?php echo $guide[0]['tour_guide_name'] ?></b>
	  						<br>
	  						<b class="color-blue">Phone Number - <?php echo $guide[0]['nomor_handphone'] ?></b>
	  						<div class="row">
	  							<div class="col-md-4">
	  								<?php 
	  									$exp = get("select count(tour_guide_id) ttl from booking_package where tour_guide_id = '".$guide[0]['tour_guide_id']."' and kode_booking_package != '".$_GET['q']."'");
	  								?>
	  								<br>
	  								<b class="color-green">Experience</b>
	  								<h3 style="margin-top: 5"><?php echo $exp[0]['ttl'] ?>x guide</h3>
	  							</div>
	  							<div class="col-md-8">
	  								<br>
	  								<b class="color-green">About</b>
	  								<br>
	  								<?php 
	  									echo $guide[0]['description']
	  								?>
	  							</div>
	  						</div>
	  					</div>
	  				</div>
	  					<br>
	  				<?php
	  					}
	  				?>
		  			<div class="bottom">
		  				<div class="running-text">
			  				<marquee><span><?php echo $booking[0]['overview'] ?></span></marquee>
		  				</div>
		  			</div>
  				</div>
  			</div>
<?php 
	include "slash-sidebar-user.php";
?>