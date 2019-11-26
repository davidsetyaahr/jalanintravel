<h4 class="color-green"><b>Choose The Destinations</b></h4>
<div id="error_dest"></div>
<?php 
	$sql = get("select d.destination_name,cat.category_name, d.destination_id, c.city_name, d.img,d.overview,d.tour_styles_id from destinations d join city c on d.city_id = c.city_id join categories cat on d.category_id = cat.category_id where d.city_id = '".$_SESSION['custom']['step1']['city_id']."' order by d.destination_id desc ");
	foreach ($sql as $data) {
	$img = explode(",", $data['img']);
?>

<div class="row">
<a href="" class="select-dest hover-line color-grey" data-id="<?php echo $data['destination_id'] ?>">
<input type="checkbox" value="<?php echo $data['destination_id'] ?>" name="aa[]" id="id<?php echo $data['destination_id'] ?>" class="custompack-check" style="opacity: 0">

<br>
	<div class="col-md-4">
		<div class="packages">
			<div class="image">
				<div class="city">
			    	<img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
					<span class="city"><span id="jalan" class="jalan">#<?php echo $data['city_name'] ?></span>
			    </div>
			    <div class="layer"></div>
			    <img src="<?php echo base_url()."assets/img/destinations/".$img[0]; ?>" class="img-responsive img-destinations transition05">
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<h4 class="mt-0"><b><span class='facheck'></span><span class="color-blue"><?php echo $data['destination_name'] ?></span> / <span class="color-green"><?php echo $data['category_name'] ?></span></b></h4>
		<div class="hairline flat"></div>
		<br>
		<div class="row">
			<div class="col-md-9">
				<?php echo substr($data['overview'],0,150) ?>...
			</div>
			<div class="col-md-3">
				<div class="row">
					<?php 
						$ts = explode(",", $data['tour_styles_id']);
						foreach ($ts as $key => $value) {
							$getTs = get("select tour_style_name tsname, icon from tour_style where tour_style_id = '$value'");
							foreach ($getTs as $dataTs) {
					?>
					<div class="col-md-5" style="padding: 5px;">
						<div data-toggle="tooltip" title="<?php echo $dataTs['tsname'] ?>" class="thumbnail" style="padding: 10px;margin-bottom: 0">
							<img src="<?php echo base_url()."assets/img/tour-style/".$dataTs['icon'] ?>" class="img-responsive">
						</div>
					</div>
				<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</a>
</div>
<br>
<div class="hairline flat"></div>
<?php } ?>
		</div>
	</div>
</div>
