<?php 
  if(empty($_SESSION['package']['step3'])){
      echo "<script>window.location='add-package?step=3'</script>";
  }
?>

<div class="col-md-12" id="erroffice">
</div>
<?php 
	$sql = get("select bo.*, c.city_name from branch_office bo join city c on bo.city_id = c.city_id");
	$transport = get("select accommodation_id, accommodation_name from accommodations");
	$n = 0;
//	thisarray($_SESSION['package']['step4']);
	foreach ($sql as $index => $office) {
?>
<div class="col-md-12">
	<div class="col-md-3">
		<img src="<?php echo base_url()."assets/img/branch-office/".$office['img'] ?>" class="img-responsive img-rounded thumbnail">
		<br>
	</div>
	<div class="col-md-9">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<td><b>Nama</b></td>
					<td>:</td>
					<td>Kantor Cabang <?php echo $office['city_name'] ?></td>
				</tr>
				<tr>
					<td><b>Alamat</b></td>
					<td>:</td>
					<td><?php echo $office['address'] ?></td>
				</tr>
				<tr>
					<td><b>Nomer Handphone</b></td>
					<td>:</td>
					<td><?php echo $office['phone_number'] ?></td>
				</tr>
			</table>
		</div>
		<?php 
			$show = "";
			$check = "";
			$time = "";
			$nameDay = "";
			$nameTime = "";
			$nameAcc = "";
			if(isset($_SESSION['package']['step4'])){
				foreach ($_SESSION['package']['step4']['office_id'] as $key => $value) {
					if($key==$index){
						$time = $_SESSION['package']['step4']['departure_time'][$key];
						$check = ($_SESSION['package']['step4']['office_id'][$key]==$office['office_id']) ? "checked" : "";
						$show = ($_SESSION['package']['step4']['office_id'][$key]==$office['office_id']) ? "yes" : "";
						$nameDay = "departure_day[$n]";
						$nameTime = "departure_time[$n]";
						$nameAcc = "accommodation_id[$n]";
					}
				}
			}
		?>
		<div class="row hideinput" data-sess="<?php echo isset($_SESSION['package']['step4']) ? "yes" : "no" ?>" id="col<?php echo $n ?>" data-show="<?php echo $show; ?>">
			<div class="col-md-4">
				<label>Hari Keberangkatan</label>
 				<label class="error" id="errday<?php echo $n ?>"></label>
 				<select class="form-control select-day" id="<?php echo "day".$n ?>" name="<?php echo $nameDay; ?>" data-name="departure_day[<?php echo $n ?>]">
					<?php
						for ($i=0; $i <=2; $i++) { 
							$sel = "";
							if(isset($_SESSION['package']['step4'])){
								foreach ($_SESSION['package']['step4']['departure_day'] as $key => $value) {
									if($key==$index){
										$sel = ($_SESSION['package']['step4']['departure_day'][$key]=="h-$i") ? "selected" : "";
									}
								}
							}
							$day = ($i==0) ? "Hari H" : "H -(min) $i";
							echo "<option value='h-$i' $sel>$day</option>";
						}
					 ?>
				</select>
			<br>
			</div>
			<div class="col-md-4">
				<label>Waktu Keberangkatan</label>
 				<label class="error" id="errdep<?php echo $n ?>"></label>
 				<?php 
 				?>
				<input type="text" id="<?php echo "time".$n ?>" name="<?php echo $nameTime ?>" data-name=	"departure_time[<?php echo $n ?>]" class="input time-picker form-control" placeholder="Klik Disini" value="<?php echo $time ?>" readonly>
		<br>
			</div>
			<div class="col-md-4">
				<label>Transportasi</label>
 				<label class="error" id="erracc<?php echo $n ?>"></label>

				<select id="select<?php echo $n ?>" data-name="<?php echo "accommodation_id[$n]" ?>" name="<?php echo $nameAcc ?>" class="select form-control">
					<option value="">---Select---</option>
					<?php 
						foreach ($transport as $t) {
						$sel = "";
						if(isset($_SESSION['package']['step4'])){
							foreach($_SESSION['package']['step4']['accommodation_id'] as $key => $value) {
								if($key==$index){
									$sel = ($_SESSION['package']['step4']['accommodation_id'][$key]==$t['accommodation_id']) ? "selected" : "";
								}
							}
						}

							echo "<option value='".$t['accommodation_id']."' $sel>$t[accommodation_name]</option>";
						}
					?>
				</select>
			</div>

		</div>
		<label class="fancy-checkbox thumbnail showcheck" id="me<?php echo $n ?>" data-target="#col<?php echo $n ?>" style="display: inline-block;">
			<input type="checkbox" name="office_id[<?php echo $n ?>]" value="<?php echo $office['office_id'] ?>" <?php echo $check ?>>
			<span style="color: #28a66d"><b> Pilih Opsi Keberangkatan Dari Kota Ini</b></span>	
		</label>
	</div>
</div>
<?php
	$n++;
	}
?>