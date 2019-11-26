<?php 
  if(empty($_SESSION['package']['step4'])){
      echo "<script>window.location='add-package?step=4'</script>";
  }
//  thisarray($_SESSION['package']['step4']);
	$no = 0;
	foreach ($_SESSION['package']['step4']['office_id'] as $key => $value) {
		$office = get("select c.city_name, bo.address from branch_office bo join city c on bo.city_id = c.city_id where bo.office_id = '$value'");
		$acc = get("select accommodation_name from accommodations where accommodation_id = '".$_SESSION['package']['step4']['accommodation_id'][$key]."' ");
?>
<div class="col-md-12">
	<div class="row thumbnail">
		<div class="col-md-1 text-center">
			<h1 class="lnr lnr-apartment" style="margin: 5px;"></h1>
		</div>
		<div class="col-md-10 text-center">
			<h5>Keberangkatan dari : <b><?php echo $office[0]['city_name'] ?></b> / Waktu : <b><?php echo $_SESSION['package']['step4']['departure_time'][$key] ?> WIB</b> / Transportasi : <b><?php echo $acc[0]['accommodation_name'] ?></b></h5>
		</div>
		<div class="col-md-1 text-center">
			<h1 class="lnr lnr-car" style="margin: 0px;"></h1>
		</div>
	</div>
	<div class="row col-md-12 error" id="err<?php echo $no ?>">
	</div>
	<?php 
		$cat = get("select * from pax_categories order by pax_category_id desc");
		$n = 0;
		$ccount = count($cat);
		echo '<span id="span'.$no.'" data-count="'.$ccount.'" data-rpax="0"></span>';
		foreach ($cat as $cat) {
		$range = explode("-", $cat['range_age']);
		$price = 0;
		if(isset($_SESSION['package']['step5'])){
			foreach ($_SESSION['package']['step5']['price'] as $key => $val) {
				foreach ($_SESSION['package']['step5']['price'][$key] as $index => $val) {
					if($key==$no && $index==$n){
						$price =  $_SESSION['package']['step5']['price'][$key][$index];
					}
				}
			}
		}
	?>
	<div class="row" id="<?php echo "row".$no.$n; ?>">
		<!--div class="col-md-1" id="me<?php echo $no.$n ?>">
			<br>
			<button style="margin-top: 5px;" data-id="<?php echo $no.$n ?>" data-span="<?php echo "#span".$no ?>" data-loop="<?php echo $no ?>" data class="btn btn-danger remove-pax"><b>X</b></button>
		</div-->
		<div class="col-md-4" id="md<?php echo $no.$n ?>">
			<label>Kategori Umur</label>
			<input type="text" class="form-control" value="<?php echo $cat['name_pax_category'] ?>" disabled>
			<input type="hidden" name="pax_category_id[<?php echo $no ?>][<?php echo $n ?>]" value="<?php echo $cat['pax_category_id'] ?>">
		</div>
		<div class="col-md-4">
			<label>Range Umur</label>
			<input type="text" class="form-control" value="<?php echo $range[0]." - "; echo ($range[1]=="+") ? "Ke Atas" : $range[1]." tahun" ?> " disabled>
		</div>
		<div class="col-md-4">
			<label>Harga / pax <span class="error" id="errprice<?php echo $no.$n ?>"></span></label>
			<input type="number" class="form-control" name="price[<?php echo $no ?>][<?php echo $n ?>]" value="<?php echo $price ?>">
		</div>
	</div>
	<br>
	<?php $n++; } ?>
	<br>
</div>
<?php
$no++;
	}
?>