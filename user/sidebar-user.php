<?php 
	$top['first'] = "User";
	$top['second'] = "My Account";
	include "../common/top.php";
	$title = "Jalanin | ".$_SESSION['first_name'];
	?>
<div class="container custom">
	<div class="row page-user" data-user="<?php echo $_SESSION['user_id'] ?>">
		<div class="col-md-3 user-left">
			<ul>
				<li <?php echo $active['notif'] ?>>
					<a href="notifications">
						<span class="fa fa-bell"></span> Notifications </a>
						<span class="thisnotif"></span>
				</li>
				<li <?php echo $active['account'] ?>><a data-toggle="collapse" data-target="#target1" href="#"><span class="fa fa-cog"></span> Account Option</a>
				<div class="collapse" id="target1">
					<ul>
						<li><a href="account">Update Account</a></li>
						<li><a href="change-password">Change Password</a></li>
					</ul>
				</div>
				</li>
				<li <?php echo $active['booking'] ?>><a href="booking"><span class="fa fa-money"></span> Booking Tour Packages</a></li>
				<li><a href="custom-tour"><span class="fa fa-edit"></span> Custom Tour</a></li>
				<li><a href=""><span class="fa fa-star"></span> Rating</a></li>
				<li><a href=""><span class="fa fa-comment"></span> Comments</a></li>
				<!--li><a href=""><span class="fa fa-history"></span> Log Aktivitas</a></li>
				<li><a href=""><span class="fa fa-send"></span> Kritik Dan Saran</a></li-->
			</ul>
		</div>
