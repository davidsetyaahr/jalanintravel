<?php 
	$title = "Jalanin | Hotels";
	$top['first'] = "Hotels";
	$top['second'] = "List Hotels";
	include "../common/top.php";
?>
  <div class="container custom">
    <div class="first-content">
      <span class="first"><?php echo $top['first'] ?></span> 
      <span class="second color-green"> > </span>
      <span class="third color-green"> <?php echo $top['second'] ?> </span>
    </div>
  </div>
  <hr class="for-first-content">

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="image-hotel">
				<div class="layer"></div>
				 <img src="<?php echo base_url()."assets/img/hotels/hotel.jpg"; ?>" class="img-responsive padding-top">
		</div>
		</div>
		<div class="col-md-6 jarak">
			<b class="">Kristal Hotel Jakarta</b><br>
			<img src="<?php echo base_url()."assets/img/common/star.png" ?>" class="star">
			<img src="<?php echo base_url()."assets/img/common/star.png" ?>" class="star">
			<img src="<?php echo base_url()."assets/img/common/star.png" ?>" class="star">
			<img src="<?php echo base_url()."assets/img/common/star.png" ?>" class="star">
			<img src="<?php echo base_url()."assets/img/common/star.png" ?>" class="star"><br>
		<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
			<div class="box-border"><img src="<?php echo base_url()."assets/img/common/placeholder.png" ?>" class="gps">Jalan Tarogong Raya, Lebak Bulus, Cilandak, 12430 jakarta</div>
		</div>
		<div class="col-md-3 jarak-border">
			<center><p class="font"><b class="color-text">IDR</b> 300.000<br>/PACKAGE</p></center><br>
			<center><a href="detail.php"><input type="button" name="button" value="DETAIL" class="btn btn-custom green btn-block"></center><br>
		</div>
	</div>
</div>

<?php 
	include "../common/bottom.php";
?>