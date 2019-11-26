<?php 
	include "../../common/top.php";
	$panel['icon'] = "lnr lnr-star";
	$panel['title'] = "Custom Tour";
	$panel['subtitle'] = "Custom Tour / Data Pemesanan";
	$panel['btn'] = "";
	$title = "Custom Tour | Data Pemesanan";
	include "../../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form action="set-price.php" method="post">
			<div class="col-md-6">
				<label>Tentukan Harga</label>
				<div class="input-group">
					<span class="input-group-addon">Rp. </span>
					<input type="number" name="sale" value="0" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<label>Pesan</label>
					<input type="text" name="sale" value="-" class="form-control">
			</div>
			<div class="col-md-6">
				<br>
				<?php echo btn_add() ?>
			</div>
			</form>
		</div>
	</div>
</div>
<?php
	include "../../common/slash-panel.php";
	include "../../common/bottom.php";
?>