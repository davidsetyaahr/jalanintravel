<?php 
	session_start();
	include "../../config/autoload.php";
	if(empty($_SESSION['user_id'])){
		header("location: ".base_url()."user/signin");
	}
	$step = (empty($_GET['step'])) ? 1 : $_GET['step'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Custom Tour Package</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/timepicker/css/timePicker.css">
	
    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/custom.css">
</head>
<body>
<div class="container mt-8">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4 class="color-grey">
				<i class="fa fa-send color-green"></i>
				&nbsp;
				<b>PLANNING YOUR VACATION</b>
			</h4>
			<?php 
				if($step==1){
			?>
			<br>
			<div class="input-big-search">
			<form action="" method="get">
			<input type="text" name="q" class="big-search" placeholder="Find your destination" value="<?php echo isset($_GET['q']) ? $_GET['q'] : "" ?>" autofocus="true">
			<button type="reset" style="padding: 0;border:0">
				<span class="x-remove">X</span>
			</button>
			</form>
			</div>
			<?php } else if($step==2){ ?>
			<br>
			<div class="input-big-search">
			<input type="text" class="big-search" placeholder="Find More Than 50 Travel Destinations" name="" autofocus="true">
			<span class="x-remove">X</span>
			</div>
			<?php } ?>
			<div class="custom-step next-content">
				<div class="line-step">
				</div>
				<?php 
					$arrText = ["Choose a city","Destinations","Trip Duration","Schedulde","Final!"];
					$ss = 0;
					for($s=0;$s<5;$s++){
						$ss++;
						$act = $ss<=$step ? "active" : "";
				?>
				<a href="?step=<?php echo $ss ?>">
					<div class="this-step color-grey">
						<i class="fa fa-circle <?php echo $act ?>"></i>
						<br>
						<i class="fa fa-<?php echo $act=="active" ? "check color-green" : "chevron-down" ?>"></i>
						<div class="text-step <?php echo $act ?>">
							<?php echo $arrText[$s] ?>
						</div>
					</div>
				</a>
				<?php
					}
				?>
			</div>
			<br>
			<br>
			<?php 
				$next = $step + 1;
				if($step==1){
					include "custom-step1.php";					
				}
				else if($step==2){
					if(empty($_SESSION['custom']['step1']['city_id'])){
						header("location:?step=1");
					}
					else{
						include "custom-step2.php";
					}
				}
				else if($step==3){					
					include "custom-step3.php";
				}
				else if($step==4){
					include "custom-step4.php";
				}
				else if($step==5){
					include "custom-step5.php";
				}
			?>
			<br>
			<center>
				<a href="" class="btn btn-default">Prev</a>
				&nbsp;
				<a href="<?php echo base_url()."packages/custom/?step=$next" ?>" class="btn btn-success custompack-next" data-step="<?php echo $step ?>">Next</a>
			</center>
			<br>
			<br>
			<br>
    <script src="<?php echo base_url() ?>assets/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/timepicker/js/jquery-timepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/custom/js/custom.js"></script>

</body>
</html>