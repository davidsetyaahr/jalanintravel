<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/jalanintravel/config/autoload.php";
  if(empty($_SESSION['admin_id'])){
  	echo "<script>window.location='".base_url()."admin'</script>";
  }
  else{
  	$dataadmin = get("select fullname,avatar from admin where admin_id = '".$_SESSION['admin_id']."' ");
  }
?>

<!doctype html>
<html lang="en">

<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>template/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>template/assets/css/vendor/icon-sets.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>template/assets/css/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/timepicker/css/timePicker.css">
	
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/custom-admin.css">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
    <div id="loading">
    	<center>
	      <img src="<?php echo base_url()."assets/img/common/box.gif" ?>">
	      <p>Tunggu Sebentar....</p>
    	</center>
    </div>

	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- SIDEBAR -->
		<div class="sidebar">
			<div class="brand">
				<a href="index.html" class="logo"><center><span class="first">JALANIN</span> <span class="secon">TRAVEL</span></center></a>
			</div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/booking/" class=""><i class="lnr lnr-cart"></i> <span>Pemesanan</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/packages/custom/" class=""><i class="lnr lnr-star"></i> <span>Custom Tour</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/income/" class=""><i class="lnr lnr-database"></i> <span>Pemasukan</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/destinations/" class=""><i class="lnr lnr-map-marker"></i> <span>Destinasi</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/packages/" class=""><i class="lnr lnr-earth"></i> <span>Paket Wisata</span></a></li>
						<li>
							<a href="#subHotel" data-toggle="collapse" class="collapsed"><i class="lnr lnr-store"></i> <span>Hotel</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subHotel" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url() ?>admin/hotels/view-data-hotels" class="">Data Hotel</a></li>
									<li><a href="<?php echo base_url() ?>admin/hotels/room-hotel/view-room-hotel" class="">Room Hotel</a></li>
								</ul>
							</div>
						</li>
						<li><a href="<?php echo base_url() ?>admin/branch-office/view-kantor-cabang" class=""><i class="lnr lnr-apartment"></i> <span>Kantor Cabang</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/accommodations/view-accommodations" class=""><i class="lnr lnr-car"></i> <span>Transportasi</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/tour-guide/view-tour-guide" class=""><i class="lnr lnr-user"></i> <span>Pemandu Wisata</span></a></li>
						<li><a href="<?php echo base_url() ?>admin/users/view-users" class=""><i class="lnr lnr-users"></i> <span>User</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-keyboard"></i> <span>Lainnya</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url() ?>admin/data-master/view-kota" class="">Kota</a></li>
									<li><a href="<?php echo base_url() ?>admin/data-master/view-provinsi" class="">Provinsi</a></li>
									<li><a href="<?php echo base_url() ?>admin/data-master/view-kategori" class="">Kategori</a></li>
									<li><a href="<?php echo base_url() ?>admin/data-master/view-tour-style" class="">Tour Style</a></li>
									<li><a href="<?php echo base_url() ?>admin/data-master/view-opsi-pembayaran" class="">Opsi Pembayaran</a></li>
									<li><a href="<?php echo base_url() ?>admin/data-master/view-durasi" class="">Durasi</a></li>
									<li><a href="<?php echo base_url() ?>admin/data-master/view-range" class="">Kategori Umur</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
			<!--a class="footer" href="http://twitter.com/share?url=https://goo.gl/1dt1MR&amp;text=So cool! Free Bootstrap dashboard template by @thedevelovers. Download at&amp;hashtags=free,bootstrap,dashboard" title="Twitter share" target="_blank"><i class="fa fa-twitter"></i> <span>SHARE THIS FREEBIE</span></a-->
		</div>
		<!-- END SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- NAVBAR -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
							<span class="sr-only">Toggle Navigation</span>
							<i class="fa fa-bars icon-nav"></i>
						</button>
					</div>
					<div id="navbar-menu" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu thisnotif" data-toggle="dropdown">
									<i class="lnr lnr-alarm"></i>
								</a>
								<ul class="dropdown-menu notifications">
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url()."assets/img/avatar/".$dataadmin[0]['avatar'] ?>" width="20px" class="img-circle" alt="Avatar"> <span><?php echo $dataadmin[0]['fullname'] ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url() ?>admin/users/profile"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
									<li><a href="<?php echo base_url()."admin/common/logout" ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- END NAVBAR -->
