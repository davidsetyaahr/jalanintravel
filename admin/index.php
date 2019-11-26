<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Jalanin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSS -->
	<link rel="stylesheet" href="../template/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../template/assets/css/vendor/icon-sets.css">
	<link rel="stylesheet" href="../template/assets/css/main.min.css">
	<link rel="stylesheet" href="../assets/custom/css/custom-admin.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../template/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../template/assets/img/apple-icon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<?php 
								if(isset($_GET['error'])){
									echo "<br><br><div class='alert alert-success'>Login Gagal</div>";
								}
								else{
									echo "<br><br><br><br>";
								}
							?>
							<div class="logo text-center"><a href="index.html" class="logo"><center><span class="first" style="color:#28a66d">JALANIN</span> <span class="secon">TRAVEL</span></center></a></div>
							<form class="form-auth-small" method="post" action="common/auth">
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Email</label>
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-success btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span><i class="fa fa-copyright"></i> <a href="#">Jalanin Travel 2018</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Login Admin Jalanin</h1>
							<p>Masuk Ke Akun Jalanin Untuk Mengelola Website</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
