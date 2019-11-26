<?php
	$title = "Jalanin | Sign In";
	$top['first'] = "User";
	$top['second'] = "Sign In";
	include "../common/top.php";
?>
<div class="bg-grey">
	<br>
<div class="container next-content">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="box-border" style="position: relative;">
				<div class="logo-white"><span id="jalan" class="jalan">SIGN</span><span class="in">IN</span>
				</div>
				<div class="logo-white-bbottom"></div>
				<div class="next-content">
					<form action="<?php echo base_url()."user/auth" ?>" method="post">
						<div class="content-title">Email</div>
						<div class="f-12 mb-10">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						</div>
						<input type="email" class="form-control radius0 input-bbottom" name="email">
						<br>
						<div class="content-title">Password</div>
						<div class="f-12 mb-10">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						</div>
						<input type="password" class="form-control input-bbottom radius0" name="password">
						<br>
						<input type="submit" class="btn btn-custom green btn-block" value="Sign In">
					</form>
					<br>
					<div class="text-center">
						Don't have an account? Sign up <a href="signup" class="custom-link green">Here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
</div>
<?php
	include "../common/bottom.php";
?>
