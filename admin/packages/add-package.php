<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-earth";
	$panel['title'] = "Paket Wisata";
	$panel['subtitle'] = "Paket Wisata / Tambah Paket Wisata";
	$panel['btn'] = btn_admin("index","Lihat Data","view");
	include "../common/panel.php";
	$title = "Packages | View Tour Packages";
	$packages = get("SELECT p.package_id,p.package_name,d.duration_time,p.tour_styles_id,p.img,p.overview,p.min_pax,p.max_pax,p.url from packages p join durations d on p.duration_id = d.duration_id");
	$step = (isset($_GET['step'])) ? $_GET['step'] : 1;
	$count_step = 6;
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<?php 
		  				$width = ((100/$count_step)-1)."%";
						for($i=1;$i<=$count_step;$i++){
					?>
						<a href="<?php echo base_url()."admin/packages/add-package?step=$i" ?>" class="text-center step <?php echo ($i==$_GET['step']) ? "active" : "" ?>" style="display:inline-block;width: <?php echo $width ?> !important">
							Step <?php echo $i ?>
						</a>
					<?php } ?>
				</div>
			</div>
	</div>
</div>
<div class="panel panel-headline">
	<div class="panel-body">
		<form id="frm-add-package" action="set-session.php" method="post" data-url="?step=<?php echo $step+1 ?>" data-step="<?php echo $step ?>" enctype="multipart/form-data">
			<!--input type="hidden" name="step" value="<?php echo $step ?>"-->
			<div class="row">
				<?php 
				/*
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
				*/	
					if($step==1){
						include "add-package-s1.php";						
					}
					else if($step==2){						
						include "add-package-s2.php";						
					}
					else if($step==3){						
						include "add-package-s3.php";						
					}
					else if($step==4){						
						include "add-package-s4.php";						
					}
					else if($step==5){						
						include "add-package-s5.php";						
					}
					else if($step==6){						
						include "add-package-s6.php";						
					}
				?>
	    		<div class="col-md-12">
	    			<br>
	    			<center>
	    				<?php if($step>1){
	    					$prev = $step-1;
	    				?>
		    			<a href="<?php echo base_url()."admin/packages/add-package?step=$prev" ?>" class="btn btn-default"><span class="fa fa-chevron-left"></span> Kembali</a> &nbsp;	
			    		<?php } ?>
		    			<button type="submmit" class="btn btn-success"><?php echo ($step==$count_step) ? "<span class='fa fa-plus-circle'></span> Tambahkan" : "Selanjutnya <span class='fa fa-chevron-right'></span>" ?> </button>
	    			</center>
	    		</div>
			</div>
		</form>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>