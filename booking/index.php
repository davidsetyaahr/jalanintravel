<?php
if(empty($_GET['step'])){
	include "../error/404.php";
}
else{
	if($_GET['step']==1 || $_GET['step']==2 || $_GET['step']==3 || $_GET['step']==4 || $_GET['step']==5|| $_GET['step']==6){
	include "../common/top.php";
	if(empty($_SESSION['user_id'])){
		header("location: ".base_url()."user/signin");
	}
	$arrTitle = ["","Account Informations", "About Tour Package", "Price List", "Detail & Departure", "Payment Method"];
	$step = $_GET['step'];
	$count_step = 5;
	$package = get("select p.package_id, p.package_name,d.duration_time,p.overview,p.min_pax,max_pax,p.url,p.img,p.tour_styles_id,p.room_hotel_id,p.sale from packages p join durations d on p.duration_id = d.duration_id where p.url = '$_GET[q]' ");
	$account = get("select first_name,last_name,email from users where user_id =  '$_SESSION[user_id]' ");
	$title = "Booking Package | Step $_GET[step]";
?>
  <div class="container custom">
    <div class="title-itinerary">
      <h3><b><?php echo $package[0]['package_name'] ?></b></h3> 
    </div>
    <div class="itinerary-menu-container">
    	<div class="itinerary-menu">
	    <ul class="nav navbar-nav ul-itinerary">
	    	<li><a href=""><span class="color-green">MIN PAX : </span><?php echo $package[0]['min_pax'] ?> PAX</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right itinerary-info">
	    	<li><a href=""><span class="color-green">MAX PAX : </span><?php echo $package[0]['max_pax'] ?> PAX</a></li>
	    	<li><a href="">|</a></li>
	    	<li><a href=""><span class="color-green">Package</span> <?php echo $package[0]['duration_time'] ?> Day</a></li>
	    	<li><a href="">|</a></li>
	    	<li><a href="">
          <span class="color-green">Harga Mulai : </span>
        <?php 
            $minPrice = min_price($package[0]['package_id'])['price'];
            $sale = min_price($package[0]['package_id'])['sale'];
            if($sale!=0){
              echo "<span class='color-blue'><del>Rp. ".number_format($minPrice,0,',','.')."</del>";
              echo "- <small style='color:red'>Diskon ".$sale."%</small>";
            }
            else{
            echo "<span class='color-blue'>Rp. ".number_format($minPrice,0,',','.')."</span>";
            }
            echo " / Pax";
        ?>
        </a></li>
	    </ul>
	</div>
    </div>
  </div>
  <div class="bg-grey">
	<div class="container step">
	  	<div class="text-center">
	  		<h2 class="color-blue"><b>Step <?php echo $step ?></b>  &nbsp; <b class="color-green">></b> &nbsp; <?php echo $arrTitle[$step]; ?></h2>
	  	</div>
	  	<div class="row">
	  		<div class="col-md-8 col-md-offset-2">
	  			<?php 
	  				for($i=1;$i<=$count_step;$i++){
	  				$width = ((100/$count_step)-1)."%";
	  			?>
	  			<a href="?q=<?php echo $package[0]['url']."&step=".$i ?>" class="stepbystep <?php echo ($step==$i) ? "active" : "" ?>" style="width: <?php echo $width ?>	"></a>
	  			<?php } ?>
	  		</div>
	  	</div>
	  	<br>
	  	<br>
	  	<br>
	  	<div class="row">
	  		<div class="col-md-10 col-md-offset-1">
	  			<div class="row">
	  				<input type="hidden" value="<?php echo $package[0]['package_id'] ?>" id="package_id">
	  		<?php 
	  			if($step==1){
	  		?>
	  		<div class="col-md-4">
	  			<label>First Name</label>
	  			<div class="input-wcheck">
		  			<input type="text" class="form-control input-bbottom radius0" value="<?php echo $account[0]['first_name']; ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>
	  			</div>
	  		</div>
	  		<div class="col-md-4">
	  			<label>Last Name</label>
	  			<div class="input-wcheck">
	  			<input type="text" class="form-control input-bbottom radius0" value="<?php echo $account[0]['last_name']; ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>
	  			</div>
	  		</div>
	  		<div class="col-md-4">
	  			<label>Email</label>
	  			<div class="input-wcheck">
	  			<input type="text" class="form-control input-bbottom radius0" name="" value="<?php echo $account[0]['email'] ?>" readonly>
		  			<span class="fa fa-check-circle color-green"></span>
	  			</div>
	  		</div>
	  		<?php } else if($step==2){
	  		echo "<div class='col-md-12'><div class='error' id='error-sum-pax'></div><br></div>"; 
	  			$pax_category = get("select * from pax_categories");
	  			$count = 0;
	  			$getCount = count($pax_category);
	  			foreach ($pax_category as $pc) {
	  				$rangeAge = explode("-", $pc['range_age']);
	  		?>
	  			<div class="col-md-4 loadstep2">
		  			<label>PAX | <?php echo $pc['name_pax_category'] ?> <small class="color-green"><?php echo $rangeAge[0]; echo ($rangeAge[1]=="+") ? " tahun keatas" : " - ".$rangeAge[1]." tahun" ?></small> <small class="error" id="error-pax"></small> <br><small id="errorpax<?php echo $count ?>" class="error"></small></label>
			  		<input type="number" data-count="<?php echo $getCount ?>" class="form-control input-bbottom radius0 bg-grey input-pax" name="" id="pax<?php echo $count ?>" data-id="<?php echo $pc['pax_category_id'] ?>" value="<?php echo isset($_SESSION['booking']['pax']) ? $_SESSION['booking']['pax'][$count][1] : "" ?>">
	  			</div>
	  		<?php 
	  				$count++;
			  	} 
	  		?>
	  			<div class="col-md-12">
		  			<br>
		  			<label>Start Tour <small class="error" id="error-start-tour"></small></label>
		  			<?php 
			  			$start_tour = "";
			  			$end_tour = "";
			  			$valueStart_tour = "";
			  		if(isset($_SESSION['booking']['start_tour'])){
			  			$start_tour = date("D Y-m-d",strtotime($_SESSION['booking']['start_tour']));
			  			$end_tour = date("D Y-m-d",strtotime($_SESSION['booking']['end_tour']));
			  			$valueStart_tour = tanggalindo($start_tour,2)." S/d ".tanggalindo($end_tour,2);

			  		}
			  		?>
			  		<input type="text" class="form-control input-bbottom radius0 bg-grey" id="start-tour" data-toggle="modal" data-value="<?php echo isset($_SESSION['booking']['start_tour']) ? $_SESSION['booking']['start_tour'] : "" ?>" data-valueend="<?php echo isset($_SESSION['booking']['end_tour']) ? $_SESSION['booking']['end_tour'] : "" ?>" data-target="#myModal" value="<?php echo $valueStart_tour; ?>" style="background: #f2f2f2" readonly>
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-lg">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header mymodal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title color-blue"><b><span class="fa fa-calendar"></span> Start Date Of The Package  (Package <?php echo $package[0]['duration_time'] ?> Day)</span></b></h4>
					      </div>
					      <div class="modal-body">
					        <p><b>Choose your date :</b></p>
					        <div class="table-responsive">
					        	<table class="table table-striped table-hover">
					        		<thead>
					        			<tr>
					        				<td><b>#</b></td>
					        				<td><b>Start Tour</b></td>
					        				<td><b>End Tour</b></td>
					        				<td><b>Option</b></td>
					        			</tr>
					        		</thead>
					        		<tbody>
					        			<?php
					        				$endOfstart = "";
					        				$minusDate = 0;
					        				$max = 10; 
					        				$dateNow = date("Y-m")."-1";
					        				$startTour = strtotime($dateNow."+ 2 days");
					        				$dateStart = date("Y-m-d", $startTour);
					        				$no = 0;
					        				for($i=1;$i<=$max;$i++){
					        				if($i==1){
					        					$start = $dateStart;
					        					$end = date("Y-m-d",(strtotime($dateStart."+ ".$package[0]['duration_time']." days")-1));
					        				}
					        				else{
						        				$range = $package[0]['duration_time']*($i-1);
						        				$start = date("Y-m-d", strtotime($dateStart."+ ".$range." days"));
						        				$end = date("Y-m-d", (strtotime($start."+ ".$package[0]['duration_time']." days")-1));
					        				}
					        				if($i==$max){
					        					$endOfstart = $start;
					        				}
					        				if((strtotime(date("Y-m-d")."+ 2 days")) < strtotime($start)){
					        					$no++;
					        				$cekDate = get("select count(kode_booking_package) ttl from booking_package where package_id = '".$package[0]['package_id']."' and start_tour = '$start'");
					        				$indoStart = date("D Y-m-d",strtotime($start));
					        				$indoEnd = date("D Y-m-d",strtotime($end));
					        			?>
					        			<tr>
					        				<td><?php echo $no ?></td>
					        				<td><?php echo tanggalindo($indoStart,2) ?></td>
					        				<td><?php echo tanggalindo($indoEnd,2) ?></td>
					        				<td>
					        				<?php if($cekDate[0]['ttl']>0){
					        					echo "<b class='error'><span class='fa fa-minus-circle'></span> Booked</b>";
					        				} else{ 
					        				?>
					        					<a class="btn btn-default check-date" id="date<?php echo $no ?>" data-alias="<?php echo tanggalindo($indoStart,2)." S/d ".tanggalindo($indoEnd,2) ?>" data-value='<?php echo $start ?>' data-valueend='<?php echo $end ?>'><span class="fa fa-check-circle"></span> Pilih</a>
					        				<?php } ?>
					        				</td>
					        			</tr>
					        			<?php
					        				}
					        				else{
					        					$minusDate++;
					        				}
					        			}
					        			$n = $max-$minusDate;
					        			$startDateLoop = date("Y-m-d", strtotime($endOfstart."+ ".$package[0]['duration_time']." days"));
					        			for($x=1;$x<=$minusDate;$x++){
					        				$n++;
					        				if($x==1){
					        					$start = $startDateLoop;
					        					$end = date("Y-m-d",(strtotime($start."+ ".$package[0]['duration_time']." days")-1));
					        				}
					        				else{
						        				$range = $package[0]['duration_time']*($x-1);
						        				$start = date("Y-m-d", strtotime($startDateLoop."+ ".$range." days"));
						        				$end = date("Y-m-d", (strtotime($start."+ ".$package[0]['duration_time']." days")-1));
					        			}
					        				$cekDate = get("select count(kode_booking_package) ttl from booking_package where package_id = '".$package[0]['package_id']."' and start_tour = '$start'");
					        				$indoStart = date("D Y-m-d",strtotime($start));
					        				$indoEnd = date("D Y-m-d",strtotime($end));

					        			?>
					        			<tr>
					        				<td><?php echo $n; ?></td>
					        				<td><?php echo tanggalindo($indoStart,2) ?></td>
					        				<td><?php echo tanggalindo($indoEnd,2) ?></td>
					        				<td>
					        				<?php if($cekDate[0]['ttl']>0){
					        					echo "<b class='error'><span class='fa fa-minus-circle'></span> Booked</b>";
					        				} else{ 
					        				?>
					        					<a class="btn btn-default check-date" id="date<?php echo $no ?>" data-alias="<?php echo tanggalindo($indoStart,2)." S/d ".tanggalindo($indoEnd,2) ?>" data-value='<?php echo $start ?>' data-valueend='<?php echo $end ?>'><span class="fa fa-check-circle"></span> Pilih</a>
					        				<?php } ?>
					        				</td>
					        			</tr>
					        		<?php } ?>
					        		</tbody>
					        	</table>
					        </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>			  		
	  			</div>
	  		<?php } else if($step==3){
	  			if(empty($_SESSION['booking']['pax'])){
	  				echo "<script>window.location='?q=".$package[0]['url']."&step=2'</script>";
	  			} 
	  			else{
	  			echo "<div class='col-md-1'></div><div class='col-md-11'><h4 class='error' id='error-price'></h4></div>";
	  			$getPrice = get("select pp.office_id,pp.price_id,bo.address,bo.phone_number,bo.img,c.city_name,pr.province_name from packages_price pp join branch_office bo on pp.office_id = bo.office_id join city c on bo.city_id = c.city_id join province pr on c.province_id = pr.province_id where pp.package_id = '".$package[0]['package_id']."'");
	  			$no = 0;
	  			$count = count($getPrice);
	  			foreach ($getPrice as $data) {
	  				$check = "";
	  				$show = "";
	  				if(isset($_SESSION['booking']['price_id'])){
	  					$show = ($_SESSION['booking']['price_id']==$data['price_id']) ? "show" : "";
	  					$check = ($_SESSION['booking']['price_id']==$data['price_id']) ? "checked" : "";
	  				}
	  				$no++;
	  			?>
	  			<div class="col-md-12">
	  				<div class="row">
	  					<div class="col-md-1">
	  						<h2 class="color-grey"><?php echo $no ?></h2>
	  						<input type="radio" name="keberangkatan" class="radio-inline" value="<?php echo $data['price_id'] ?>" id="check<?php echo $no ?>" style="opacity: 0" <?php echo $check?>>
	  					</div>
	  					<div class="col-md-11">
	  						<label for="check<?php echo $no ?>" data-id="<?php echo $no ?>" id="label-check<?php echo $no ?>" class="label-check price-list" data-count="<?php echo $count; ?>">
	  						<div class="mylayer layer <?php echo $show ?>" id="<?php echo $no ?>">
	  							<span class="fa fa-check-circle"></span>
	  						</div>
							<div class="row">
			  					<div class="col-md-3">
			  						<img src="<?php echo base_url()."assets/img/branch-office/".$data['img'] ?>" class="img-responsive img-rounded">
			  					</div>
			  					<div class="col-md-5">
			  						<h4 class="color-blue" style="margin-bottom: 10px;"> Departure From : </h4><h5><b><?php echo $data['city_name'].", ".$data['province_name']; ?></b></h5>
			  						<div>
			  						<h5 class="color-grey" style="letter-spacing: 1px;word-spacing: 1">Click Next to determine where to pick up</h5>
			  						<h5 class="color-green bbottom-dotted"><span class="fa fa-phone"></span> <?php echo $data['phone_number'] ?> &nbsp; <span class="fa fa-map"></span> <?php echo $data['address'] ?></h5>

			  						</div>
			  					</div>
			  					<div class="col-md-4">
			  						<blockquote class="color-blue">
			  							<div class="table-responsive">
			  								<table class="table">
			  							<?php
			  								$ttl = 0;
			  								$ttlPax = 0;
				  							foreach ($_SESSION['booking']['pax'] as $pax) {
				  								$get_pax = get("select ppd.price, ppd.sale,pc.name_pax_category from packages_price_detail ppd join pax_categories pc on ppd.pax_category_id = pc.pax_category_id where ppd.price_id = '".$data['price_id']."' and ppd.pax_category_id = '".$pax[0]."'");
				  								$paxPrice = ($get_pax[0]['sale']==0) ? $get_pax[0]['price'] : $get_pax[0]['price'] - ($get_pax[0]['sale']*$get_pax[0]['price']/100);
				  								$ttl = $ttl + ($paxPrice * (int)$pax[1]);
				  								$ttlPax = $ttlPax + (int)$pax[1];
			  							?>
			  							<tr>
			  								<td><span class="color-grey"><?php echo $get_pax[0]['name_pax_category'] ?></span></td>
			  								<td><span class="color-grey"><?php echo $pax[1]; ?></span></td>
			  								<td><span class="color-grey">Rp. <?php echo number_format($paxPrice * (int)$pax[1],0,',','.') ?></span></td>
			  							</tr>
			  							<?php
			  							}
			  							?>
					  							<tr>
					  								<td><b class="color-green"><?php echo $ttlPax." Pax" ?></b>
					  								<?php 
					  									if($package[0]['sale']>0){
					  										echo "<br>";
					  										echo "<b class='error'>Off ".$package[0]['sale']."%</b>";
					  									}
					  								?>
					  								</td>
													<td colspan="2"><b class="pull-right color-blue"><?php echo ($package[0]['sale']==0) ? "Rp. ".number_format($ttl,0,',','.') : "<del>Rp. ".number_format($ttl,0,',','.')."</del>" ; ?></b>
														<?php 
															if($package[0]['sale']>0){
																echo "<br><b class='pull-right error'>Rp. ".number_format($ttl - ($package[0]['sale'] * $ttl /100) ,0,',','.')."</b>";
															}
														?>
													</td>		
					  							</tr>
			  								</table>
			  							</div>
			  						</blockquote>
			  					</div>

							</div>	  						
	  						</label>
	  					</div>
	  				</div>
	  				<hr>
	  			</div>
	  		<?php } } } else if($step==4){
	  			if(empty($_SESSION['booking']['price_id'])){
	  				echo "<script>window.location='?q=".$package[0]['url']."&step=3'</script>";
	  			}
	  			else{
			  			$start_tour = date("D Y-m-d",strtotime($_SESSION['booking']['start_tour']));
			  			$end_tour = date("D Y-m-d",strtotime($_SESSION['booking']['end_tour']));
			  			$valueStart_tour = tanggalindo($start_tour,2)." S/d ".tanggalindo($end_tour,2);

	  			$myPrice = get("select acc.accommodation_name, pp.time_departure,pp.day_departure,pp.office_id,pp.price_id,bo.address,bo.phone_number,bo.img,c.city_name,pr.province_name from packages_price pp join accommodations acc on pp.accommodation_id = acc.accommodation_id join branch_office bo on pp.office_id = bo.office_id join city c on bo.city_id = c.city_id join province pr on c.province_id = pr.province_id where pp.package_id = '".$package[0]['package_id']."' and pp.price_id = '".$_SESSION['booking']['price_id']."' ");
		  			$rooms = get("select rh.room_type, h.hotel_name from room_hotel rh join hotels h on rh.hotel_id = h.hotel_id where rh.room_hotel_id = '".$package[0]['room_hotel_id']."'");
	  		?>
	  		<div class="col-md-12">
  				<div class="itinerary" style="margin-top: 0">
	  				<div class="top">
	  					<img class="transition05"  src="<?php echo base_url()."assets/img/destinations/".$package[0]['img'] ?>">
	  					<div class="layer"></div>
	  					<div class="text"><span><?php echo $package[0]['package_name'] ?></span></div>
	  				</div>
	  				<div class="row middle">
	  					<div class="col-md-1 day">
	  						<?php echo $_SESSION['booking']['ttlpax']."<br>" ?>
		  						PAX
	  					</div>
	  					<div class="col-md-8">
		  					<div class="desc">
		  						<p>Tour : </p>
		  						<h5 class="color-grey"> - Package <?php echo $package[0]['duration_time']." Day"; ?></h5>
		  						<h5 class="color-grey mb-25"> - Start from <?php echo $valueStart_tour; ?></h5>
		  						<p>Departure : </p>
		  						<h5 class="color-grey"> - <?php
		  						$dayDep = explode("-", $myPrice[0]['day_departure']);
		  						if($dayDep[1]==0){
		  							echo tanggalindo(date("D Y-m-d", (strtotime($_SESSION['booking']['start_tour']))), 2);
		  						}
		  						else{
		  							echo tanggalindo(date("D Y-m-d", strtotime($_SESSION['booking']['start_tour']."- ".$dayDep[1]." days")), 2);
		  						}
		  						echo substr($myPrice[0]['time_departure'], 0,5)." WIB";
		  						?></h5>
		  						<h5 class="color-grey mb-25"> - <?php echo $myPrice[0]['accommodation_name'] ?></h5>
		  						<p>Hotel</p>
		  						<h5 class="color-grey mb-25"><?php echo $rooms[0]['hotel_name']." - ".$rooms[0]['room_type']." Room" ?></h5>
		  						<h5 class="color-green"><?php ?></h5>
		  						<p>Information Branch Office:</p>
		  						<h5 class="color-green"><?php echo $myPrice[0]['city_name']." - ".$myPrice[0]['province_name'] ?></h5>

			  						<h5 class="color-green"><span class="fa fa-phone"></span> <?php echo $myPrice[0]['phone_number'] ?> &nbsp; <span class="fa fa-map"></span> <?php echo $myPrice[0]['address'] ?></h5>
			  						<br>	
			  					<form id="form4" enctype="multipart/form-data">
			  							
			  					<p>Pick up : <span class="error" id="erroralamat"></span></p>
			  					<div class="row">
			  						<div class="col-md-12">
					  					<input type="text" class="form-control input-bbottom radius0" id="alamat" name="alamat" placeholder="Pick up addess" value="<?php echo (isset($_SESSION['booking']['alamat'])) ? $_SESSION['booking']['alamat'] : "" ?>">
			  						</div>
			  						<!--div class="col-md-6">
			  							<div class="error" id="errorwaktu"></div>
										<input type="text" class="time-picker form-control  input-bbottom radius0" placeholder="Waktu Penjemputan" id="waktu" style="background: white" value="<?php echo (isset($_SESSION['booking']['waktu'])) ? $_SESSION['booking']['waktu'] : "" ?>" readonly>
			  						</div-->
			  					</div>
			  					<br>
			  					<p>KTP <span class="error" id="errorfile"></span></p>
			  					<div class="row" id="addfile">
			  						<div class="col-md-6">
			  							<span class="error" id="error_file_ex0"></span>
			  							<input type="file" class="form-control file" name="file[]" id="file0">
			  						</div>
			  					</div>
			  					<br>
			  					</form>
			  					<button class="btn btn-success btn-addfile">Add File</button>
		  					</div>
	  					</div>
	  					<div class="col-md-3">
	  						<div class="right">
			  							<?php
			  								$ttl = 0;
			  								$ttlPax = 0;
				  							foreach ($_SESSION['booking']['pax'] as $pax) {
			  								$get_pax = get("select ppd.price, ppd.sale,pc.name_pax_category from packages_price_detail ppd join pax_categories pc on ppd.pax_category_id = pc.pax_category_id where ppd.price_id = '".$myPrice[0]['price_id']."' and ppd.pax_category_id = '".$pax[0]."'");
				  								$paxPrice = ($get_pax[0]['sale']==0) ? $get_pax[0]['price'] : $get_pax[0]['price'] - ($get_pax[0]['sale']*$get_pax[0]['price']/100);
				  								$ttl = $ttl + ($paxPrice * (int)$pax[1]);
				  								$ttlPax = $ttlPax + (int)$pax[1];
			  							?>
			  							<div class="bbottom-dotted">
											<b><?php echo $get_pax[0]['name_pax_category']."(".$pax[1].") <span class='pull-right'>Rp. "; echo number_format($paxPrice * (int)$pax[1],0,',','.')."</span>" ?>			  				</b>				
			  							</div>
			  							<br>
			  							<?php
			  							}
			  							?>
			  							<?php if($package[0]['sale']>0){ ?>
			  							<div style="display: block;" class="category">
			  								<span class="error">Off <?php echo $package[0]['sale']."%</span>"; echo "<span class='pull-right'>Rp. ".number_format($ttl - ($package[0]['sale'] * $ttl /100),0,',','.')."</span>	" ?>
			  							</div>
			  						<?php } else{ ?>
			  							<div style="display: block;" class="category">
			  								<span class="color-green"><?php echo $ttlPax." Pax</span>"; echo "<span class='pull-right'>Rp. ".number_format($ttl,0,',','.')."</span>	" ?>
			  							</div>

			  						<?php } ?>
							    <div class="tag-img">
						              	<?php 
						              		$ex = explode(",", $package[0]['tour_styles_id']);
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
							   <img src="<?php echo base_url()."assets/img/branch-office/".$myPrice[0]['img'] ?>" class="img-responsive img-rounded">
							   <br>
							   <a class="color-blue bbottom-dotted" href="<?php echo base_url()."packages/detail?q=".$package[0]['url'] ?>" target="_blank"><b>Lihat Jadwal Tour <span class="color-green">Disini</span></b></a>
	  						</div>
	  					</div>
	  				</div>
	  				<hr>
		  			<div class="bottom">
		  				<div class="running-text">
			  				<marquee><span><?php echo $package[0]['overview'] ?></span></marquee>
		  				</div>
		  			</div>
  				</div>
	  		</div>
	  		<?php } } else if($step==5){
	  			if(empty($_SESSION['booking']['alamat'])){
			  			echo "<script>window.location='?q=".$package[0]['url']."&step=4'</script>";
	  			}
	  			else{
			  			include "save-booking.php";
	  		 ?>
	  			<div class="col-md-12">
	  				<div class="text-center">
	  					<span class="fa fa-check-circle fa-5x color-green"></span>
	  					<h2>
			  					Transaction Success
	  					</h2>
	  					<hr>
						Thank you for trusting us. Hopefully your tour is fun
	  					<br>
						Make a payment using various methods below<br> 
						Please check the continuation of your tour on the "My Tour" menu located
	  					<br>
						on the menu on your right or click the button that says "My tour" below
	  					<hr>
	  					<div class="row">
	  						<?php 
	  							$bank = get("select * from bank_option");
	  							foreach ($bank as $bank) {
	  						?>
	  						<div class="col-md-3">
	  							<div class="box-border">
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
	  				</div>
	  			</div>
	  		<?php }} ?>
	  		<div class="col-md-12 text-center">
	  			<?php 
	  				if($step!=1 && $step!=$count_step){
	  			?>
	  			<a href="?q=<?php echo $package[0]['url']."&step=".($step-1) ?>" class="next-content btn btn-custom blue">< Prev </a>
	  			&nbsp;
		  		<?php } if($step!=$count_step){ ?>
	  			<a href="?q=<?php echo $package[0]['url']."&step=".($step+1) ?>" class="next-content btn btn-custom green next-step" data-step="<?php echo $step ?>">Next > </a>
	  			<?php } else{ ?>
	  			<a href="<?php echo base_url()."user/booking" ?>" class="next-content btn btn-custom green next-step" data-step="<?php echo $step ?>">My Tour </a>
	  			<?php } ?>
	  		</div>
	  	</div>
	  	</div>
	  	</div>
	  	<form>
	  	</form>
	</div>
  </div>
<?php 
	include "../common/bottom.php";
	}
	else{
		include "../error/404.php";
	}
}
?>