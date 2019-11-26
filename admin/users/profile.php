<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-user";
	$panel['title'] = "Profil";
	$panel['subtitle'] = "Profil / Profil Admin";
	$panel['btn'] = "";
	$title = "Profil | Profil Admin";
	include "../common/panel.php";
	$profil = get("select * from admin where admin_id = '".$_SESSION['admin_id']."'");
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<?php 
				if(isset($_GET['error'])){
					echo "<div class='col-md-12'><div class='alert alert-danger'>$_GET[error]</div></div>";
				}
				else if(isset($_GET['msg'])){
					echo "<div class='col-md-12'><div class='alert alert-success'>Berhasil Diupdate</div></div>";
				}
			?>
			<div class="col-md-3">
				<div class="thumbnail">
					<center>
						<img src="<?php echo base_url()."assets/img/avatar/".$profil[0]['avatar'] ?>" class="img-responsive">
					</center>
				</div>
			</div>
			<div class="col-md-9">
				<form action="update-profile.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>Username</label>
						<br>
						<input type="text" class="form-control" name="username" value="<?php echo $profil[0]['username'] ?>">
					</div>
					<div class="col-md-6">
						<label>Nama Lengkap</label>
						<br>
						<input type="text" class="form-control" name="fullname" value="<?php echo $profil[0]['fullname'] ?>">
					</div>
					<div class="col-md-6">
						<br>
						<label>Password Lama</label>
						<input type="password" class="form-control" name="old" placeholder="Isi Disini..">
					</div>
					<div class="col-md-6">
						<br>
						<label>Password Baru</label>
						<input type="password" class="form-control" name="new" placeholder="Isi Disini..">
					</div>
					<div class="col-md-6">
						<br>
						<label>Foto (Baru)</label>
						<input type="file" class="form-control" name="avatar" placeholder="Isi Disini..">
					</div>
					<div class="col-md-6">
						<br>
						<br>
						<div style="margin-top: 5px"></div>
						<?php btn_add() ?>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>