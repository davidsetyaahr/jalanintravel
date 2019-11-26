    <div id="titlehtml" data-title="<?php echo $title ?>"></div>
    <div class="container next-content">
      <hr>
      <div class="row next-content">
        <div class="col-md-12">
            <div class="content-title text-center">
              Social Media
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 space-content text-center box-border">
          <div class="socials">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-twitter"></i>
          </div>
            <div class="col-md-10 col-md-offset-1">
              <br>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Email To Subscribe">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-send"></i></span>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid partner next-content">
      <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <img src="<?php echo base_url() ?>assets/img/common/wonderful-indonesia.png">
        <img src="<?php echo base_url() ?>assets/img/common/traveloka.png">
        <img src="<?php echo base_url() ?>assets/img/common/pegipegi.png">
        <img src="<?php echo base_url() ?>assets/img/common/trip-travel.png">
        <img src="<?php echo base_url() ?>assets/img/common/travel-logo-png-8.png">
      </div>
    </div>
    </div>
    <div class="container-fluid footer">
      <div class="row">
        <div class="col-md-3">
          <h1>
            <b>
            <span id="jalan" class="jalan-before">JALAN</span><span class="in">IN</span>
          </b>
          </h1>
          <span class="title">
          Feel a different experience when traveling. Live travel is very focused on giving the best waiter for you.
          </span>
        </div>
        <div class="col-md-3">
          <div class="title">
            About Jalanin
          </div>
          <ul>
            <li><a href="">Jalanin travel is a tour service provider. We have many attractive packages.</a></li>
          </ul>
          <div class="title">
            Destinasi Wisata
          </div>
          <ul>
              <li>
            <?php 
              $Footdest = get("select destination_name from destinations");
              foreach ($Footdest as $Footdest) {
            ?>
                <a href=""><?php echo $Footdest['destination_name'] ?> / </a>
            <?php } ?>
              </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="title">
            Kategori Wisat
          </div>
          <ul>
              <li>
            <?php 
              $Footcat = get("select category_name from categories");
              foreach ($Footcat as $Footcat) {
            ?>
                <a href=""><?php echo $Footcat['category_name'] ?> / </a>
            <?php } ?>
              </li>
          </ul>
          <div class="title">
            Tour Style
          </div>
          <ul>
              <li>
            <?php 
              $Footts = get("select tour_style_name tsname from tour_style");
              foreach ($Footts as $Footts) {
            ?>
                <a href=""><?php echo $Footts['tsname'] ?> / </a>
            <?php } ?>
              </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="title">
            Paket Wisata
          </div>
      <?php 
        $Footdata = get("SELECT p.package_id,p.package_name,d.duration_time,p.img from packages p join durations d on p.duration_id = d.duration_id limit 2");
        foreach ($Footdata as $Footdata) {
      ?>
      <br>
          <div class="row">
              <div class="col-md-4">
                    <img src="<?php echo base_url()."assets/img/destinations/".$Footdata['img'] ?>" class="img-responsive img-destinations transition05">
              </div>
              <div class="col-md-8">
                <ul>
                  <li><a href=""><?php echo $Footdata['package_name'] ?></a></li>
                  <li><a href="">Paket <?php echo $Footdata['duration_time'] ?> Hari</a></li>
                </ul>
              </div>
          </div>
          <div class="hairline"></div>
    <?php } ?>

        </div>
      </div>
    </div>
    <script src="<?php echo base_url() ?>assets/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/air-datepicker-master/dist/js/datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/air-datepicker-master/dist/js/i18n/datepicker.en.js"></script>
    <script src="<?php echo base_url() ?>assets/timepicker/js/jquery-timepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/custom/js/custom.js"></script>
  </body>
</html>
