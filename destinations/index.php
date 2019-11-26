<?php 
	$title = "Jalanin | Destinations";
	$top['first'] = "Destinations";
	$top['second'] = "List Destinations";
	include "../common/top.php";
?>
<div class="bg-grey" style="background : linear-gradient(rgba(217,217,217,0.2),rgba(217,217,217,0));">
  <div class="container custom">
      <div class="next-content"></div>
  <div class="row">
    <div class="col-md-12">
        <div class="kurung">
      <div class="row">
        <div class="col-md-12">
          <form action="" method="get">
          <div class="col-md-3">
            <div class="grid">
              <div class="title-filter">Filter: <span class="color-green">Province</span></div>
              <select class="form-control radius0 get-city" name="province">
                <option value="">---Select---</option>
                <?php
                   $sql = get("select * from province");
                  foreach ($sql as $data) {
                    $s = "";
                    if(isset($_GET['province'])){
                      $s = ($_GET['province']==$data['province_id']) ? "selected" : "";
                    }
                    echo "<option value='$data[province_id]' $s>$data[province_name]</option>";
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="grid">
              <div class="title-filter">Filter: <span class="color-green">City</span></div>
              <select class="form-control radius0" id="city" name="city" disabled="true">
                <option value=''>---Select---</option>
                <?php 
                    if(isset($_GET['city'])){
                      $city = get("select city_name, city_id from city where city_id = '".$_GET['city']."' ");
                      echo "<option value='".$city[0]['city_id']."' selected>".$city[0]['city_name']."</option>";
                    }
                    ?>                
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="grid">
              <div class="title-filter">Filter: <span class="color-green">Category</span></div>
              <select class="form-control radius0" name="category">
                <option value="">---Select---</option>
                <?php 
                  $cat = get("select category_name,category_id from categories` order by category_name asc");
                  foreach ($cat as $cat) {
                  $s = '';
                  if(isset($_GET['category'])){
                    $s = ($_GET['category']==$cat['category_id']) ? "selected" : "";
                  }
                    echo "<option value='$cat[category_id]' $s>$cat[category_name]</option>";
                  }
                ?>
              </select>
            </div>
          </div>
            <div class="col-md-3">
              <br>
              <br>
              <input type="submit" name="" value="FILTER" class="btn btn-custom green btn-block radius0">
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
      <div class="next-content"></div>
  </div>
</div>
<div class="container custom">
      <div class="row space-content">
      <?php 
      if(isset($_GET['province']) && isset($_GET['city']) && isset($_GET['category'])){
        if($_GET['province']!="" && $_GET['city']=="" && $_GET['category']=="")
        {
          $filter = "where pr.province_id = '".$_GET['province']."'";
        }
        else if($_GET['province']=="" && $_GET['city']=="" && $_GET['category']!=""){
          $filter = "where cat.category_id = '".$_GET['category']."'";
        }
        else if($_GET['province']!=="" && $_GET['city']!="" && $_GET['category']==""){
          $filter = "where c.city_id = '".$_GET['city']."'";
        }
        else if($_GET['province']!="" && $_GET['city']=="" && $_GET['category']!=""){
          $filter = "where pr.province_id = '".$_GET['province']."' and cat.category_id = '".$_GET['category']."'";
        }
        else if($_GET['province']!="" && $_GET['city']!="" && $_GET['category']!=""){
          $filter = "where c.city_id = '".$_GET['city']."' and cat.category_id = '".$_GET['category']."'";
        }
      } 
      else{
        $filter = "";
      }
      $dest = get("select d.destination_name, c.city_name, d.img, d.url from destinations d join city c on d.city_id = c.city_id join province pr on c.province_id = pr.province_id join categories cat on d.category_id = cat.category_id $filter order by d.destination_id desc");
      $no = 0;
      foreach ($dest as $d) {
        $no++;
            $img = explode(",", $d['img']);
      ?>        
        <div class="col-md-4">
          <a href="<?php echo base_url()."destinations/detail?q=".$d['url'] ?>">
          <div class="destinations-img">
            <div class="layer">
              <div class="trap">
                <img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
                <p>
                <span id="jalan" class="jalan">#<?php echo $no ?> - </span><span class="in"><?php echo $d['city_name'] ?></span>
              </p>
              </div>
            </div>
            <img src="<?php echo base_url()."assets/img/destinations/".$img[0] ?>" class="img-responsive transition05">
            <div class="bottom"><center><span><?php echo $d['destination_name'] ?></span></center></div>
          </div>
        </a>
        </div>
      <?php } ?>
      </div>
</div>

<?php 
	include "../common/bottom.php";
?>