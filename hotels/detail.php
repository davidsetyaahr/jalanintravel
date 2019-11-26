<?php 
	$title = "Jalanin | Hotels";
	$top['first'] = "Hotels";
	$top['second'] = "List Hotels";
	include "../common/top.php";
?>
	<div class="hotel">
		<div class="layer"></div>
		<img src="<?php echo base_url()."assets/img/hotels/hotel.jpg" ?>" class="img-hotel">
		<div class="text-hotel">
			<div class="hotel-name">Hotel krisna</div>
			<div class="city-hotel">JAKARTA-INDONESIA</div>
			<div class="bintang">
				<img src="<?php echo base_url()."assets/img/common/star.png"?>">
				<img src="<?php echo base_url()."assets/img/common/star.png"?>">
				<img src="<?php echo base_url()."assets/img/common/star.png"?>">
				<img src="<?php echo base_url()."assets/img/common/star.png"?>">
				<img src="<?php echo base_url()."assets/img/common/star.png"?>">
			</div>
		</div>	
	</div>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 detail-left-hotel">
			<ul class="nav navbar-nav"><br>
				<li><a href=""><b>Description</b></a></li>
				<li><a href=""><b>Facilities</b></a></li>
				<li><a href=""><b>Price</b></a></li>
			</ul>
		</div>
		<div class="col-md-4 padding-left">
			<img src="<?php echo base_url()."assets/img/common/peta.png"?>" class="img-responsive">
		</div>
	</div>
</div>
<?php 
	include "../common/bottom.php";
?>