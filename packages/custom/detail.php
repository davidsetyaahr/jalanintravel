<?php 
	session_start();
	include "../../config/autoload.php";
	$tour = get("select c.custom_id,c.address,c.ktp,c.title,d.duration_time,rm.room_type,h.hotel_name,c.departure,a.accommodation_name,c.status from custom_packages c join durations d on c.duration_id = d.duration_id join accommodations a on c.trans_id = a.accommodation_id join room_hotel rm on c.room_id = rm.room_hotel_id join hotels h on rm.hotel_id = h.hotel_id where c.custom_id = '$_GET[q]'");
	$day = 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Custom Tour Package</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/timepicker/css/timePicker.css">
	
    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/custom.css">
</head>
<body>
<div class="bg-grey">
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php 
				for ($i=0; $i < $tour[0]['duration_time']; $i++) { 
					$day++;
				$sqlImg = get("select d.img,i.start,i.end,i.title,i.description,c.icon,category_name,d.tour_styles_id tsid from custom_packages_itinerary i join destinations d on i.destination_id = d.destination_id join categories c on d.category_id = c.category_id where i.custom_id = '$_GET[q]' and i.day = '$day'");
				$ex = explode(",", $sqlImg[0]['img']);
				?>
			  		<div class="itinerary itinerary-package">
				  		<div class="top">
				  			<br>
				  			<br>
				  			<br>
				  			<br>
				  			<br>
				  			<br>
				  			<br>
							<img src="<?php echo base_url()."assets/img/destinations/".$ex[0] ?>" class='img-responsive transition05'>
				  			<div class="layer"></div>
				  			<div class="text"><span><b>Day Ke - <?php echo $day ?></b></span></div>
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
</div>