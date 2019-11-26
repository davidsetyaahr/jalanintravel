<?php 
	include "sidebar-user.php";
	$img = get("select * from users where user_id = '".$_SESSION['user_id']."' ");
?>
<div class="col-md-9 user-right">
	<div class="row">
		<?php 
			if(isset($_GET['msg'])){
				echo "<div class='col-md-12'><div class='alert alert-success'><b>Berhasil Diupdate</b></div></div>";
			}
		?>
		<form action="update-account.php" method="post" enctype="multipart/form-data">
		<div class="col-md-3">
			<img src="<?php echo base_url()."assets/img/avatar/".$img[0]['avatar'] ?>" class="img-responsive thumbnail">
			<input type="file" name="avatar">
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-6">
					<label>Nama Depan</label>
					<input type="text" class="form-control radius0 input-bbottom" name="first_name" value="<?php echo $img[0]['first_name'] ?>" required>
				</div>
				<div class="col-md-6">
					<label>Nama Belakang</label>
					<input type="text" class="form-control radius0 input-bbottom" name="last_name" value="<?php echo $img[0]['last_name'] ?>" required>
				</div>
				<div class="col-md-12">
					<br>
					<button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Perbarui</button>
					<button type="reset" class="btn btn-default"><span class="fa fa-trash"></span> Reset</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?php 
	include "slash-sidebar-user.php";
?>
