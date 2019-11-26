<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-home";
	$panel['title'] = "account";
	$panel['subtitle'] = "account";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<form>
				<div class="row">
					<div class="col-md-6">
						<label>full_name</label>
						<input type="text" name="" class="form-control" placeholder="masukan nama">
					</div>
					<div class="col-md-6">
						<label>Email</label>
						<input type="email" name="" class="form-control" placeholder="masukan email anda">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Password</label>
						<input type="password" name="" class="form-control" placeholder="masukan password">
					</div>
					<div class="col-md-6">
						<label>avatar</label>
						<input type="text" name="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>phone_number</label>
						<input type="text" name="" class="form-control">
					</div>
					<div class="col-md-6">
						<label>address</label>
						<input type="text" name="" class="form-control">
					</div>
				</div>
			</form>
		</div>
	</div>
	
</div>

<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>