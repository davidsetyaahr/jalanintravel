<?php 
	include "sidebar-user.php";
	$tour = get("select c.custom_id,c.address,c.ktp,c.title,d.duration_time,rm.room_type,h.hotel_name,c.departure,a.accommodation_name,c.status from custom_packages c join durations d on c.duration_id = d.duration_id join accommodations a on c.trans_id = a.accommodation_id join room_hotel rm on c.room_id = rm.room_hotel_id join hotels h on rm.hotel_id = h.hotel_id where c.custom_id = '$_GET[q]'");
	$day = 0;
?>
<div class="col-md-9 user-right">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<label>Packages Name : <span class="color-green"><?php echo $tour[0]['title'] ?></span></label>
					<hr>
					<label>Trip Duration : <span class="color-green"><?php echo $tour[0]['duration_time'] ?> Hari</span></label>
					<hr>
					<label>Departure : <span class="color-green"><?php echo tanggalindo(date("D Y-m-d H:i:s",strtotime($tour[0]['departure'])),2) ?></span></label>
					<img src="<?php echo base_url()."assets/img/attachment/".$tour[0]['ktp'] ?>" class="img-responsive">
				</div>
				<div class="col-md-6">
					<label>Transportation : <span class="color-green"><?php echo $tour[0]['accommodation_name'] ?></span></label>
					<hr>
					<label>Pick Up Address : <span class="color-green"><?php echo $tour[0]['address'] ?></span></label>
					<hr>
					<label>Hotel : <span class="color-green"><?php echo $tour[0]['hotel_name'] ?> (<?php echo $tour[0]['room_type'] ?> Room)</span></label>
					<br>
					<br>
					<br>
					<?php 
						if($tour[0]['status']=="0"){
							echo "<b class='btn btn-danger'>Status Pending</b>";
						}
						else if($data['status']=="1"){
								echo "<b class='btn btn-success'>Status Success</b>";
						}
					?>
				</div>
			</div>
			<?php 
				for ($i=0; $i < $tour[0]['duration_time']; $i++) { 
					$day++;
				$sqlImg = get("select d.img,i.start,i.end,i.title,i.description,c.icon,category_name,d.tour_styles_id tsid from custom_packages_itinerary i join destinations d on i.destination_id = d.destination_id join categories c on d.category_id = c.category_id where i.custom_id = '$_GET[q]' and i.day = '$day'");
				$ex = explode(",", $sqlImg[0]['img']);
				?>
			  		<div class="itinerary itinerary-package">
				  		<div class="top">
							<img src="<?php echo base_url()."assets/img/destinations/".$ex[0] ?>" class='img-responsive transition05'>
				  			<div class="layer"></div>
				  			<div class="text"><span><b>Day - <?php echo $day ?></b></span></div>
				  		</div>
				  		<?php 
				  		$trip = 0;
				  			foreach ($sqlImg as $key => $value) {
				  				$trip++;
				  		?>
				  		<div class="row middle" style="padding-bottom: 10px;">
		  					<div class="col-md-1 day text-center">
				                Trip <?php echo $trip ?>
				            </div>
				            <div class="col-md-8">
			  					<div class="desc">
			  						<div class="time"><?php echo date("H:i", strtotime($value['start']))." - ".date("H:i", strtotime($value['end'])) ?></div>
			  						<div class="title"><?php echo $value['title'] ?></div>
			  						<p><?php echo $value['description'] ?></p>
			  					</div>
				            </div>
		  					<div class="col-md-3">
		  						<div class="right">
			  						<span class="category"><img src="<?php echo base_url()."assets/img/category/".$value['icon'] ?>"> <?php echo $value['category_name'] ?></span> 
								    <div class="tag-img">
				                    <?php 
				                      $exts = explode(",", $value['tsid']);
				                      for($x=0;$x<count($exts);$x++){
				                        $getImg = get("select * from tour_style where tour_style_id = '".$exts[$x]."' ");
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
				  	</div>
				<?php
				}	
				?>
		</div>
	</div>
</div>
<?php 
	include "slash-sidebar-user.php";
?>
