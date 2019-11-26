<?php
  include "common/top.php";
  $title = "Jalanin";
?>
    <div class="banner">
      <video width="300" height="200" autoplay="autoplay" repeat="true">
        <source src="assets/videos/Surf trip in Bali - Indonesia Paradise (HD).mp4" type="video/mp4" />
      </video>
      <div class="layer">
        <div class="text">
          <div class="top">
              <span class="jalan-before">JALAN</span><span class="in">IN</span>
              Travel
          </div>
          <div class="bottom">
            Feel The Different Trip
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row next-content">
        <?php 
          $tour_style = get("select * from tour_style limit 4");
          foreach ($tour_style as $ts) {
        ?>
        <div class="col-md-3">
          <div class="box-border">
            <center>
              <img src="assets/img/tour-style/<?php echo $ts['icon'] ?>" class="img-responsive">
              <br>
              <div class="title color-green">
                <?php echo strtoupper($ts['tour_style_name']) ?>
              </div>
            </center>
          </div>
        </div>
      <?php } ?>
      </div>
      <div class="row next-content">
        <div class="col-md-12">
            <div class="content-title">
              New  Tour Packages
            </div>
        </div>
      </div>
      <div class="row space-content">
      <?php 
        $data = get("SELECT p.package_id,p.package_name,d.duration_time,p.tour_styles_id,p.img,p.overview,p.min_pax,p.max_pax,p.url from packages p join durations d on p.duration_id = d.duration_id order by package_id desc limit 2");
        foreach ($data as $data) {

      ?>
      <div class="col-md-6">
      <a href="<?php echo base_url()."packages/detail?q=".$data['url'] ?>">
      <div class="the-packages">
        <div class="row">
          <div class="col-md-5">
                <div class="packages">
                  <div class="image">
                    <div class="city">
                          <img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
                <small><span class="city"><span id="jalan" class="jalan">#1 - </span><span class="in">TERBARU</span></span></small>
                    </div>
                    <div class="layer"></div>
                    <img src="<?php echo base_url()."assets/img/destinations/".$data['img'] ?>" class="img-responsive img-destinations transition05">
                  </div>
                </div>
          </div>
          <div class="col-md-7">
            <div class="row desc">
              <div class="col-md-12">
                <div class="title"><?php echo $data['package_name'] ?> (<?php echo $data['duration_time']." Hari" ?>)</div>
              </div>
              <div class="col-md-12">
                <div class="row grid">
                  <div class="col-md-7 border left">
                    <?php echo substr($data['overview'],0,70)." [....]" ?>
                  </div>
                  <div class="col-md-5 right">
                    <div class="price">
                      <small class="color-blue"><span class="color-green">Harga Mulai : </span>
                        <?php 
                              $minPrice = min_price($data['package_id'])['price'];
                              $sale = min_price($data['package_id'])['sale'];
                              if($sale!=0){
                                echo "<span class='color-blue'><del>Rp. ".number_format($minPrice,0,',','.')."</del></span>";
                                echo "- <small style='color:red'>Diskon ".$sale."%</small>";
                              }
                              else{
                              echo "<span class='color-blue'>Rp. ".number_format($minPrice,0,',','.')."</span>";
                              }
                          ?>
                        / Pax</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
    <?php } ?>
      </div>
      <div class="row next-content">
        <div class="col-md-12">
            <div class="content-title">
              Most Booking
            </div>
        </div>
      </div>
      <div class="row space-content">
      <?php 
        $data = get("SELECT p.package_id,p.package_name,d.duration_time,p.tour_styles_id,p.img,p.overview,p.min_pax,p.max_pax,p.url from packages p join durations d on p.duration_id = d.duration_id limit 2");
        foreach ($data as $data) {

      ?>
      <div class="col-md-6">
      <a href="<?php echo base_url()."packages/detail?q=".$data['url'] ?>">
      <div class="the-packages">
        <div class="row">
          <div class="col-md-5">
                <div class="packages">
                  <div class="image">
                    <div class="city">
                          <img src="<?php echo base_url() ?>assets/img/common/trapesium.png" class="city img-responsive">
                <small><span class="city"><span id="jalan" class="jalan">#1 - </span><span class="in">TERBARU</span></span></small>
                    </div>
                    <div class="layer"></div>
                    <img src="<?php echo base_url()."assets/img/destinations/".$data['img'] ?>" class="img-responsive img-destinations transition05">
                  </div>
                </div>
          </div>
          <div class="col-md-7">
            <div class="row desc">
              <div class="col-md-12">
                <div class="title"><?php echo $data['package_name'] ?> (<?php echo $data['duration_time']." Hari" ?>)</div>
              </div>
              <div class="col-md-12">
                <div class="row grid">
                  <div class="col-md-7 border left">
                    <?php echo substr($data['overview'],0,70)." [....]" ?>
                  </div>
                  <div class="col-md-5 right">
                    <div class="price">
                      <small class="color-blue"><span class="color-green">Harga Mulai : </span>
                        <?php 
                              $minPrice = min_price($data['package_id'])['price'];
                              $sale = min_price($data['package_id'])['sale'];
                              if($sale!=0){
                                echo "<span class='color-blue'><del>Rp. ".number_format($minPrice,0,',','.')."</del></span>";
                                echo "- <small style='color:red'>Diskon ".$sale."%</small>";
                              }
                              else{
                              echo "<span class='color-blue'>Rp. ".number_format($minPrice,0,',','.')."</span>";
                              }
                          ?>
                        / Pax</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
    <?php } ?>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row next-content text-center">
        <a href="packages" class="btn btn-custom green">View More</a>
      </div>
      <div class="row next-content" style="background: #f6f6f6">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <br>
              <br>
              <br>
              <br>
              <h1 class="color-blue"><b>Customize Tour Package?</b></h1>
              <div class="text-custom">In this feature you can more freely prepare your vacation, starting from a tourist destination, the schedule during the trip takes place, the start and end time of the tour, all of you in control </div>
              <br>
                <a href="<?php echo base_url()."packages/custom" ?>" class="btn btn-custom green">Click Here</a>
                <br>
                <br>

            </div>
          </div>
        </div>
        <div class="col-md-7" style="padding-right:0">
          <img src="assets/img/common/done.jpg" class="img-responsive">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row next-content">
        <div class="col-md-12">
            <div class="content-title">
                DESTINATIONS
            </div>
        </div>
      </div>
      <div class="row space-content">
      <?php 
      $dest = get("select d.destination_name, c.city_name, d.img, d.url from destinations d join city c on d.city_id = c.city_id order by d.destination_id desc");
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

        <!--div class="col-md-3">
          <div class="packages">
            <div class="image">
              <div class="city">
                    <img src="assets/img/common/trapesium.png" class="city img-responsive">
                    <span class="city color-blue">KOMODO</span>
              </div>
              <div class="layer"></div>
              <img src="assets/img/destinations/komodo.jpg" class="img-responsive img-destinations transition05">
            </div>
            <div class="desc">
              <div class="about-this">
                <div class="top">
                  6 Night In Komodo Island
                </div>
                <div class="price color-green">
                  IDR 1.000.000 / <span>person</span>
                </div>
                <div class="text-desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
              <div class="tag-img">
                <img src="assets/img/tour-style/island.png" class="img-responsive">
                <img src="assets/img/tour-style/trekking.png" class="img-responsive">
                <img src="assets/img/tour-style/insurance.png" class="img-responsive">
                <img src="assets/img/tour-style/knowledge.png" class="img-responsive">
              </div>
            </div>
          </div>
        </div-->

<?php 
  include "common/bottom.php";
?>