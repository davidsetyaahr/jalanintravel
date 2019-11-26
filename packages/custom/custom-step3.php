<h4 class="color-green"><b>Choose Trip Duration</b></h4>
<div class="row">
<br>
	<?php 
		$sql = get("select * from durations order by duration_time asc");
		foreach ($sql as $data) {
	?>
	<div class="col-md-3">
		<label data-id="<?php echo $data['duration_id'] ?>" for="id<?php echo $data['duration_id'] ?>" class="label-check" style="cursor: pointer;">
			<div class="box-border" id="box<?php echo $data['duration_id'] ?>">
				<!--img src="<?php echo base_url()."assets/img/flaticon/crown.png" ?>" class="crown" style="width: 15%"-->

				<center>
				<img src="<?php echo base_url()."assets/img/flaticon/binoculars.png" ?>" class="img-responsive">
				<div class="hairline flat"></div>
				<br>
				<span id="check<?php echo $data['duration_id'] ?>" class="fa fa-check-circle color-green fa-lg check-day" style="display: none"></span>
				</center>
				<h4 class="color-grey text-center"><b>Package <?php echo $data['duration_time'] ?> Day</b></h4>
			</div>
			<input type="radio" value="<?php echo $data['duration_id'] ?>" class="dur-radio" name="radio" id="id<?php echo $data['duration_id'] ?>" style="opacity: 0">
		</label>
	</div>
	<?php } ?>
</div>
		</div>
	</div>
</div>
