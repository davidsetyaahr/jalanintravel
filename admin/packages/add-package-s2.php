<?php 
  if(empty($_SESSION['package']['step1'])){
      echo "<script>window.location='add-package?step=1'</script>";
  }

  if(isset($_GET['city'])){
    $filter = "where d.city_id = '$_GET[city]' ";
  }
  else if(isset($_GET['category'])){
    $filter = "where d.category_id = '$_GET[category]' ";
  }
  else if(isset($_GET['city']) && isset($_GET['category']))
  {
    $filter = "where d.city_id = '$_GET[city]' and d.category_id = '$_GET[category]' ";
  }
  else{
    $filter = "";
  }
  $dest = get("select d.destination_id, d.destination_name, c.city_name, d.img, d.url from destinations d join city c on d.city_id = c.city_id $filter order by d.destination_id desc");

?>
<div id="errdest"></div>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-6">
      <h4><b>Total Destinasi : </b></h4>
      <h4><?php echo count($dest) ?> Destinasi Wisata</h4>
    </div>
    <div class="col-md-3">
      <label>Kota</label>
      <select class="form-control" id="step2city" data-filter="<?php echo isset($_GET['city']) ? "yes" : "no" ?>">
        <option value="">---Select---</option>
        <?php 
          $city = get("select city_name,city_id from city");
          foreach ($city as $key => $value) {
            $sel = "";
            if(isset($_GET['city'])){
                $sel = ($_GET['city']==$value['city_id']) ? "selected" : "";
            }
            echo "<option value='$value[city_id]' $sel>$value[city_name]</option>";
          }
        ?>
      </select>
    </div>
    <div class="col-md-3">
      <label>Kategori</label>
      <select class="form-control" id="step2cat">
        <option value="">---Select---</option>
        <?php 
          $cat = get("select category_name,category_id from categories");
          foreach ($cat as $key => $value) {
            $sel = "";
            if(isset($_GET['category'])){
                $sel = ($_GET['category']==$value['category_id']) ? "selected" : "";
            }
            echo "<option value='$value[category_id]' $sel>$value[category_name]</option>";
          }
        ?>
        
      </select>
    </div>
  </div>
<hr>
</div>
      <?php 
      $exdest = isset($_SESSION['package']['step2']['destination_id']) ? explode(",", $_SESSION['package']['step2']['destination_id']) : "";

      $no = 0;
      foreach ($dest as $d) {
        $no++;
            $img = explode(",", $d['img']);
        $arrCheck = [];
          $checked = "";
          $inputCheck = "";
        if(isset($_SESSION['package']['step2']['destination_id'])){
          foreach ($exdest as $value) {
            if($value==$d['destination_id']){
              array_push($arrCheck, $d['destination_id']);
            }
          }
          $checked = "";
          $inputCheck = "";
          foreach ($arrCheck as $check) {
            $checked = ($check==$d['destination_id']) ? "show" : "";
            $inputCheck = ($check==$d['destination_id']) ? "checked" : "";
          }
        }
      ?>        
        <div class="col-md-4">
          <input type="checkbox" name="destination_id[]" value="<?php echo $d['destination_id'] ?>" class="check-dest" id="check<?php echo $no ?>" style="display: none" <?php echo $inputCheck ?>>
          <a href="" class="select-dest" id="<?php echo $no ?>" for="#check<?php echo $no ?>">
          <div class="destinations-img">
            <div class="layer">
            <div class="check transition05 <?php echo $checked ?>">
              <span class="lnr lnr-checkmark-circle"></span>
            </div>
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
