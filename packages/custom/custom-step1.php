			<h4 class="color-green"><b>Most Visited</b></h4>
				<div id="error_city"></div>
			<?php 
				$filter = isset($_GET['q']) ? "where city_name like '%$_GET[q]%' " : "";
				$sql = get("select * from city $filter");
				foreach ($sql as $data) {
			?>
			<div class="row">
			<a href="" class="select-city hover-line color-grey" data-id="<?php echo $data['city_id'] ?>">
				<input type="radio" value="<?php echo $data['city_id'] ?>" name="aa" id="id<?php echo $data['city_id'] ?>" class="radio" style="opacity: 0">
			<br>
				<div class="col-md-10">
					<h4 class="color-grey"><b><span></span><?php echo $data['city_name'] ?></b></h4>
					<?php
						$dest = get("select destination_name from destinations where city_id = '$data[city_id]'");
						$count = count($dest);
						$n = 0;
						foreach ($dest as $dest) {
							$n++;
							$glue = ($n!=$count) ? ", " : "";
							echo $dest['destination_name'].$glue;
						}
					?>
				</div>
				<div class="col-md-2 text-center">
					<h4 class="color-grey"><b>
					<?php 
						$ttl = get("select count(dest.city_id) ttl from booking_package bp join packages p on bp.package_id = p.package_id join package_detail pd on pd.package_id = p.package_id join itinerary i on i.detail_package_id = pd.detail_package_id join destinations dest on i.destination_id = dest.destination_id where dest.city_id = '$data[city_id]' group by bp.kode_booking_package");
							echo empty($ttl[0]['ttl']) ? 0 : $ttl[0]['ttl'];
					?>
					</b></h4>
					Booking
				</div>
				<div class="col-md-12">
					<br>
					<div class="hairline flat"></div>
				</div>
		</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

