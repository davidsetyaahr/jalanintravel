<h4 class="color-green"><b>Complete Data Below</b></h4>
		</div>
	</div>
</div>
<div class="bg-grey">
	<br>
	<div class="container" style="background: white;">
	<div class="next-content"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
						<label class="m-label">Package Name</label>
						<input type="text" id="title" class="form-control input-bbottom radius0" placeholder="Enter the name of your custom package here..">
						<br>
						<br>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="thumbnail">
									<img src="<?php echo base_url()."assets/img/common/img.png" ?>" class="img-responsive img-hotel">
								</div>
							</div>
							<div class="col-md-9">
								<label class="m-label">Hotel</label>
								<select class="form-control input-bbottom radius0" id="change-hotel">
									<option value="">---Select---</option>
									<?php 
										$hotel = get("select hotel_id,hotel_name,photo from hotels order by hotel_id desc");
										foreach ($hotel as $h) {
											echo "<option value='$h[hotel_id]'>$h[hotel_name]</option>";
										}
									?>
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3">
								<div class="thumbnail">
									<img src="<?php echo base_url()."assets/img/common/img.png" ?>" class="img-room img-responsive">
								</div>
							</div>
							<div class="col-md-9">
								<label class="m-label">Room</label>
								<select class="form-control input-bbottom radius0" id="room-hotels" disabled="" style="background: white">
									<option value="">---Select---</option>
								</select>
							</div>
						</div>
						<br>
						<br>
						<label class="m-label">Transportation</label>
						<select id="trans_id" class="form-control input-bbottom radius0">
							<option value="">---Select---</option>
							<?php $trans = get("select accommodation_id, accommodation_name from accommodations");
								foreach ($trans as $t) {
									echo "<option value='$t[accommodation_id]'>$t[accommodation_name]</option>";
								}
							?>
						</select>
						<br>
						<br>
						<label class="m-label">Pick Up Date</label>
						<input type="date" id="date" class="form-control input-bbottom radius0" placeholder="Klik Disini">
						<br>
						<br>
						<label class="m-label">Pick Up Time</label>
						<input type="text" id="time" class="form-control input-bbottom radius0 time-picker" placeholder="Klik Disini">
						<br>
						<br>
						<label class="m-label">Pick Up Address</label>
						<input type="text" id="address" class="form-control input-bbottom radius0" placeholder="Masukkan Tempat Penjemputan Anda">
						<!--br>
						<br>
						<label class="m-label">Tiket (Jika Perlu)</label>
						<select class="form-control input-bbottom radius0">
							<option>Tidak Perlu</option>
						</select-->
						<br>
						<br>
						<label class="m-label">KTP</label>
						<input type="file" id="ktp" class="form-control input-bbottom radius0" name="">
						<br>
						<br>
						<input type="checkbox" name="">
						<label class="color-green"><small>I agree with all applicable terms and conditions</small></label>

					</div>
				</div>
			</div>
		</div>
	<div class="next-content"></div>
	</div>
	<br>
</div>