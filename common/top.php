<?php 
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/jalanintravel/config/autoload.php";
  if(isset($_SESSION['user_id'])){
    $cekBooking = get("select kode_booking_package, booking_date from booking_package where user_id = '".$_SESSION['user_id']."' and status = '99' or status = '0' ");
    $dateTimeNow = date("Y-m-d H:i:s");
    foreach ($cekBooking as $cb){
     $cekDateBooking = date("Y-m-d H:i:s",strtotime($cb['booking_date']." + 1 days"));
      if(strtotime($dateTimeNow) > strtotime($cekDateBooking)){
        delete("booking_package","where kode_booking_package = '".$cb['kode_booking_package']."' ");
      }
    }
  }
?>
<html>
  <head>
    <title></title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/air-datepicker-master/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/timepicker/css/timePicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/custom.css">
  </head>
  <body>
    <div id="loading">
      <center>
        <img src="<?php echo base_url()."assets/img/common/box.gif" ?>">
        <p>Tunggu Sebentar....</p>
      </center>
    </div>
    
    <div id="home" data-value='<?php echo $transparent_menu ?>'></div>
    <div class="to-top before transition05"><i class="fa fa-chevron-up"></i><span>Back To Top</span></div>
    <nav class="mynav transition05">
    <nav class="navbar <?php echo ($transparent_menu=="yes") ? "navbar-top-before" : "navbar-top"  ?>" id="navbar-top">
      <div class="container custom">
        <ul class="nav navbar-nav nav-left text-center">
          <li><a href="">VIEW ON MAP</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right text-center">
          <li><a href="#"><img src="<?php echo base_url() ?>assets/img/flaticon/smartphone-call.png"> +6282313972908 / +6282313972908</a></li>
        </ul>
      </div>
    </nav>
    <nav class="navbar <?php echo ($transparent_menu=="yes") ? "navbar-default-before" : "navbar-default"  ?>" id="navbar-default">
      <div class="container custom">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          <a class="navbar-brand" href="#"><span id="jalan" class="<?php echo ($transparent_menu=="yes") ? "jalan-before" : "jalan"  ?>">JALAN</span><span class="in">INtravel</span></a>
        </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">        
        <ul class="nav navbar-nav navbar-right">
          <li<?php echo $active['home'] ?>><a href="<?php echo base_url() ?>">Home</a></li>
          <li<?php echo $active['destinations'] ?>><a href="<?php echo base_url()."destinations" ?>">Destinations</a></li>
          <li<?php echo $active['packages'] ?>><a href="<?php echo base_url()."packages" ?>">Tour Packages</a></li>
          <li<?php echo $active['about'] ?>><a href="<?php echo base_url()."pages/about" ?>">About</a></li>
          <li<?php echo $active['contact'] ?>><a href="<?php echo base_url()."pages/contact" ?>">Contact</a></li>
          <?php 
            if(empty($_SESSION['user_id'])){
          ?>
          <li
          <?php echo $active['signin'] ?>><a href="<?php echo base_url()."user/signin" ?>">Sign In</a>
          <?php             
            }
            else{
            ?>
          <li
          <?php echo $active['signin']; echo ($active=="") ? "class='dropdown'" : " dropdown" ?>><a href="<?php echo base_url()."user/signin" ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['first_name'] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url()."user" ?>">Account</a></li>
            <li><a href="<?php echo base_url()."user/logout" ?>">Logout</a></li>
          </ul>
          
        <?php } ?>
        </li>
        </ul>
      </div>
      </div>
    </nav>
  </nav>
  <?php 
    if($transparent_menu=="no" && $active['packages']=="" && $active['hotels']==""){
  ?>
  <div class="container custom">
    <div class="first-content">
      <span class="first"><?php echo $top['first'] ?></span> 
      <span class="second color-green"> > </span>
      <span class="third color-green"> <?php echo $top['second'] ?> </span>
    </div>
  </div>
  <hr class="for-first-content">
  <?php } ?>