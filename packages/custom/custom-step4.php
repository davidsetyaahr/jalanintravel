<?php 
//	print_r($_SESSION);
	$dest = [];
	$ex = explode(",", $_SESSION['custom']['step2']['dest_id']);
	foreach ($ex as $key => $value) {
		array_push($dest,$value);
	}
	$ttlDest = count($dest);
?>
<h4 class="color-green"><b>Making your schedule</b></h4>
		</div>
	</div>
</div>
<div class="bg-grey">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php 
				$getDur = get("select duration_time from durations where duration_id = '".$_SESSION['custom']['step3']['dur_id']."'");
				$day = 0;
				for($i=0;$i<$getDur[0]['duration_time'];$i++){
				$day++;

				if($getDur[0]['duration_time']==$ttlDest || $getDur[0]['duration_time']<$ttlDest){
					$destId = $dest[$i];
				}
				else{
					if($i>=($ttlDest-1)){
						$destId = $dest[$ttlDest-1];
					}
					else{
						$destId = $dest[$i];
					}
				}
				$thisDest = get("select destination_id,destination_name,tour_styles_id tsid,img,icon,category_name from destinations d join categories c on d.category_id = c.category_id where destination_id = '$destId' ");
				$exImg = explode(",", $thisDest[0]['img']);
			?>
  			<div class="itinerary itinerary-package" style="position: relative !important;">
	  			<div class="top">
	  				<br>
	  				<br>
	  				<br>
	  				<br>
	  				<br>
	  				<br>
	  				<br>
	  				<br>
	  				<br>
					<img src="<?php echo base_url()."assets/img/destinations/".$exImg[0] ?>" class='img-responsive transition05'>
	  					<div class="layer"></div>
	  					<div class="text"><span><b>Day Ke - <?php echo $day ?></b></span></div>
	  			</div>
	  				<div class="row middle" style="padding-bottom: 10px;" id="<?php echo $i ?>1" data-loop="<?php echo $i ?>" data-me="1">
	  					<div class="col-md-1 day text-center">
                Trip 1
                <div class="hairline flat" style="margin : 5px 0px"></div>
	                <a href="" class="color-green"><span class="fa fa-pencil-square-o"></span></a>
	                <a href="" class="error"><span class="fa fa-trash"></span></a>
	  					</div>
	  					<div class="col-md-8">
		  					<div class="desc">
		  						<div class="time">08:00 - 10:00</div>
		  						<div class="title" data-dest="<?php echo $thisDest[0]['destination_id'] ?>">Trip to <?php echo $thisDest[0]['destination_name'] ?></div>
		  						<p>Feel an unforgettable experience by exploring <?php echo $thisDest[0]['destination_name'] ?></p>
		  					</div>
	  					</div>
	  					<div class="col-md-3">
	  						<div class="right">
		  						<span class="category"><img src="<?php echo base_url()."assets/img/category/".$thisDest[0]['icon'] ?>"> <?php echo $thisDest[0]['category_name'] ?></span> 
							    <div class="tag-img">
				                    <?php 
				                      $ex = explode(",", $thisDest[0]['tsid']);
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
	  				<div id="place-trip" data-loop="<?php echo $i ?>"></div>
	  				<div class="row">
	  					<div class="col-md-12 add-trip">
	  						<span data-toggle="modal" data-id="<?php echo $i ?>" data-count="1" data-target="#myModal" class="fa fa-plus-circle plus-trip"></span>
	  					</div>
	  					<br>
	  				</div>
	  			</div>
	  		<?php } ?>
		</div>
	</div>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header mymodal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title color-blue"><b><span class="fa fa-plus-circle"></span> Make A Trip</b></h4>
      </div>
      <div class="modal-body col-md-12">
      	<div class="container col-md-12">
      		<div class="row">
      			<form action="" id="frmadd-trip" data-id="">
      			<div class="col-md-2">
      				<label>Trip</label>
      				<input type="text" style="background: white" class="form-control trip-ke txb radius0" name="trip_ke" readonly="">
      			</div>
      			<div class="col-md-5">
      				<label>Start Time</label>
						<input type="text" name="start" class="time-picker form-control txb radius0" placeholder="Klik Disini" style="background:white " readonly>
      			</div>
      			<div class="col-md-5">
      				<label>End Time</label>
      				<input type="text" style="background: white" class="time-picker form-control txb radius0" name="end" placeholder="Klik Disini" readonly="">
      			</div>
      			<div class="col-md-5">
      				<br>
      				<label>Destinations</label>
      				<select class="form-control txb radius0" name="dest_id">
      				<?php 
      					foreach ($dest as $key => $value) {
      						$getDest = get("select destination_name from destinations where destination_id = '$value'");
      						echo "<option value='$value'>".$getDest[0]['destination_name']."</option>";
      					}
      				?>
      				<option value="0">Lainnya</option>
      				</select>
      			</div>
      			<div class="col-md-7">
      				<br>
      				<label>Trip Title</label>
      				<input type="text" style="background: white" class="form-control txb radius0" name="title">
      			</div>

      			<div class="col-md-12">
      				<br>
      				<label>Trip Description</label>
      				<textarea class="form-control txt radius0" name="desc"></textarea>
      				<br>
      				<input type="submit" class="btn btn-success" name="">
      			</div>
      		</form>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

