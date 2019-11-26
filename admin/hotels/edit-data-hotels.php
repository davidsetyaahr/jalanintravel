<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-store";
	$panel['title'] = "Hotels";
	$panel['subtitle'] = "Hotels / Edit Hotels";
	$title = "Hotels | Edit Data Hotel";
	$panel['btn'] = btn_admin("view-data-hotels","Lihat Data", "view");
	include "../common/panel.php";
	$edit = get("select * from hotels where hotel_id = '".$_GET['id_hotels']."' ");
?>
<div class="panel panel-headline">
	<div class="panel-body">
			<form action="update-hotels.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Nama Hotel</label>
							<input type="hidden" name="hotel_id" class="form-control" value="<?php echo $edit[0]['hotel_id'] ?>">
						<input type="text" name="hotel_name" class="form-control" value="<?php echo $edit[0]['hotel_name'] ?>">
					</div>
						<div class="col-md-6">
      				<label>Photo</label>
      				<input type="file" name="photo" class="form-control">
      			</div>
          </div>
          <div class="row">
						<div class="col-md-6">
              <br>
              <div class="thumbnail">
              <img src="<?php echo base_url()."assets/img/hotels/".$edit[0]['photo']?>" class="img-responsive" width="50%">
              </div>
            </div>
            <div class="col-md-6">
              <br>
              <label>Bintang</label>
              <input type="text" name="star" class="form-control" value="<?php echo $edit[0]['star'] ?>">
              <br>
              <label>Alamat</label>
              <input type="text" name="address" class="form-control" value="<?php echo $edit[0]['address'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
							<br>
              <label>Deskripsi</label>
      				<input type="text"	 name="descriptions" class="form-control" value="<?php echo $edit[0]['descriptions'] ?>"><br>
      			</div>
      				<div class="col-md-6">
                <br>
      					<br>
                <?php
      					btn_add();
      					 ?>
      				</div>
          </div>
      </form>
</div>
</div>

<?php
	include "../common/slash-panel.php";
	include "../common/bottom.php";
 ?>
