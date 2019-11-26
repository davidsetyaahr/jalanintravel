<?php 
	include "../../config/model.php";
	include "../../config/function.php";
?>
	  				<div class="row middle" style="padding-bottom: 10px;" id="<?php echo $_POST['data_id'].$_POST['trip_ke'] ?>" data-me="<?php echo $_POST['trip_ke'] ?>" data-loop="<?php echo $_POST['data_id'] ?>">
	  					<div class="col-md-1 day text-center">
                Trip <?php echo $_POST['trip_ke'] ?>
                <div class="hairline flat" style="margin : 5px 0px"></div>
	                <a href="" class="color-green"><span class="fa fa-pencil-square-o"></span></a>
	                <a href="" class="error"><span class="fa fa-trash"></span></a>
	  					</div>
	  					<div class="col-md-8">
		  					<div class="desc">
		  						<div class="time"><?php echo $_POST['start'] ?> - <?php echo $_POST['end'] ?></div>
		  						<div class="title" data-dest="<?php echo $_POST['dest_id'] ?>"><?php echo $_POST['title'] ?></div>
		  						<p><?php echo $_POST['desc'] ?></p>
		  					</div>
	  					</div>
	  					<div class="col-md-3">
	  						<div class="right">
	  							<?php 
	  							if($_POST['dest_id']==0){
	  								$getCat = get("select icon,category_name from categories where category_id = '7'");
	  							}
	  							else{
	  								$getCat = get("select c.category_name, c.icon from destinations d join categories c on d.category_id = c.category_id where d.destination_id = '$_POST[dest_id]'");
	  							}
	  							?>
		  						<span class="category">
									<img src="<?php echo base_url()."assets/img/category/".$getCat[0]['icon'] ?>">
		  							 <?php echo $getCat[0]['category_name'] ?>
		  						</span> 
							    <div class="tag-img">
				                    <?php
				                    $getTs = get("select tour_styles_id tsid from destinations where destination_id = '$_POST[dest_id]'");
				                    if($_POST['dest_id']!=0){
				                      $exTs = explode(",", $getTs[0]['tsid']);
				                      for($xx=0;$xx<count($exTs);$xx++){
				                        $getImgts = get("select * from tour_style where tour_style_id = '".$exTs[$xx]."' ");
				                        foreach ($getImgts as $iconts) {
				                          echo "<img src='".base_url()."assets/img/tour-style/".$iconts['icon']."' class='img-responsive' data-toggle='tooltip' data-placement='left' title='".$iconts['tour_style_name']."'>";
				                        }      
				                      }
				                  }
				                    ?>
							    </div>
	  						</div>
	  					</div>
	  				</div>
