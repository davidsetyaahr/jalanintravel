<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-home";
	$panel['title'] = "Day-off";
	$panel['subtitle'] = "Day-off";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div col-md-6>
				<label>Date</label>
				<input type="date" name="" class="form-control">
			</div>
		</div>
	</div>
	
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>