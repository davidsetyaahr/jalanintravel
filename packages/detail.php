<?php 
  include "../common/top.php";
  $package = get("select p.package_id, p.package_name,d.duration_time,p.overview,p.min_pax,p.url,p.max_pax from packages p join durations d on p.duration_id = d.duration_id where p.url = '$_GET[q]' ");

  $detail = get("select detail_package_id, day from package_detail where package_id = '".$package[0]['package_id']."' ");
	$title = "Jalanin | ".$package[0]['package_name'];

//	$data = get("select p.package_name,d.duration_name,p.price,p.sale,dest.destination_name,c.category_name,dest.overview,");
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
          <span class="color-green">Start From : </span>
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
  	<div class="container">
  		<div class="row">
  			<div class="col-md-10 col-md-offset-1">
  				<?php 
            $n = 0;
  					foreach ($detail as $detail) {
              $arrImg = [];
              $loopidDest = get("select destination_id from itinerary where detail_package_id = '".$detail['detail_package_id']."'");
              foreach ($loopidDest as $keydest => $valdest) {
                if($valdest['destination_id']!=0){
                  $getimg = get("select img from destinations where destination_id = '".$valdest['destination_id']."'");
                  array_push($arrImg, $getimg[0]['img']);
                }
              }
//            $img = explode(",", $detail['img']);
  				?>
  				<div class="itinerary itinerary-package" id="itinerary<?php echo $n ?>">
	  				<div class="top">
              <?php 
                  foreach ($arrImg as $keyimg => $valimg) {
                    $exImg = explode(",", $valimg);
                    foreach ($exImg as $keyexImg => $valexImg) {
                      echo "<img src='".base_url()."assets/img/destinations/$valexImg' class='img-responsive transition05' id='img$n$keyexImg'>";
                    }
                  }
              ?>
	  					<div class="layer"></div>
	  					<div class="text"><span><b>Day - <?php echo $detail['day'] ?></b></span></div>
	  				</div>
              <?php 
                $itinerary = get("select d.destination_name,i.title,c.icon,c.category_name,i.tour_styles_id,i.start_time,i.end_time,i.description from itinerary i join categories c on i.category_id = c.category_id left join destinations d on i.destination_id = d.destination_id where i.detail_package_id = '".$detail['detail_package_id']."' order by i.start_time asc");
                $trip = 0;
                foreach ($itinerary as $i) {
                $trip++;
              ?>
	  				<div class="row middle">
	  					<div class="col-md-1 day text-center">
                Trip <?php echo $trip ?>
	  					</div>
	  					<div class="col-md-8">
		  					<div class="desc">
		  						<div class="time"><?php echo date("H:i",strtotime($i['start_time']))." - ".date("H:i",strtotime($i['end_time'])) ?></div>
		  						<div class="title"><?php echo $i['title'] ?></div>
		  						<p><?php echo $i['description'] ?></p>
		  					</div>
	  					</div>
	  					<div class="col-md-3">
	  						<div class="right">
		  						<span class="category"><img src="<?php echo base_url()."assets/img/category/".$i['icon'] ?>"> <?php echo $i['category_name'] ?></span> 
							    <div class="tag-img">
                    <?php 
                      $ex = explode(",", $i['tour_styles_id']);
                      for($x=0;$x<count($ex);$x++){
                        $getImg = get("select * from tour_style where tour_style_id = '".$ex[$x]."' ");
                        foreach ($getImg as $icon) {
                          echo "<img src='".base_url()."assets/img/tour-style/".$icon['icon']."' class='img-responsive' data-toggle='tooltip' data-placement='left' title='".$icon['tour_style_name']."'>";
                        }      
                      }
                    ?>
							    </div>
	  						</div>
	  					</div>
	  				</div>
            <?php } ?>
	  				<hr>
		  			<div class="bottom">
		  				<div class="running-text">
			  				<marquee><span><?php echo $package[0]['overview'] ?></span></marquee>
		  				</div>
		  			</div>
  				</div>
  			<?php $n++; }  ?>
  			</div>
  		</div>
  		<div class="col-md-10 col-md-offset-1 travel-tips">
  			<div class="row dotted">
  				<div class="col-md-6">
  					<center>
  						<img src="<?php echo base_url()."assets/img/common/world (1).png" ?>" class="img-responsive">
  						<br>
              Book now this Tour Package, specify a date to start the trip and experience a pleasant trip.
  						<br>
  						<a href="<?php echo base_url()."booking?q=".$package[0]['url']."&step=1 " ?>" class="btn btn-custom green next-content">Booking Now</a>
  					</center>
  				</div>
  				<div class="col-md-6">
  					<center>
  						<img src="<?php echo base_url()."assets/img/common/beach (1).png" ?>" class="img-responsive">
  						<br>
Choose other interesting tour packages from us. Feel an unforgettable experience when you're typing with us.  						<br>
  						<a href="<?php echo base_url()."packages" ?>" class="btn btn-custom green next-content">Another Package</a>
  					</center>
  				</div>
  			</div>
  			<div class="row tips">
  				<div class="col-md-12">
  					<div class="question">
  						<div class="q" data-toggle="collapse" data-target="#one">
		  					<span class="fa fa-question grey"></span> Lorem Ipsum Dolor Sit Amet, consectetur adipisicing elit?
  						</div>
  						<div class="a collapse in" id="one">
  							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate velit
  						</div>
  					</div>
  					<div class="question">
  						<div class="q" data-toggle="collapse" data-target="#two">
		  					<span class="fa fa-question grey"></span> Lorem Ipsum Dolor Sit Amet, consectetur adipisicing elit?
  						</div>
  						<div class="a collapse" id="two">
  							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate velit
  						</div>
  					</div>
  					<div class="question">
  						<div class="q" data-toggle="collapse" data-target="#three">
		  					<span class="fa fa-question grey"></span> Lorem Ipsum Dolor Sit Amet, consectetur adipisicing elit?
  						</div>
  						<div class="a collapse" id="three">
  							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate velit
  						</div>
  					</div>
  					<div class="question">
  						<div class="q" data-toggle="collapse" data-target="#four">
		  					<span class="fa fa-question grey"></span> Lorem Ipsum Dolor Sit Amet, consectetur adipisicing elit?
  						</div>
  						<div class="a collapse" id="four">
  							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate velit
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
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
              <a href="" class="btn btn-custom green">Click Here</a>
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
<?php 
	include "../common/bottom.php";
?>