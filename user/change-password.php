<?php 
	include "sidebar-user.php";
?>
<div class="col-md-9 user-right">
	<div class="row">
		<?php 
			if(isset($_GET['type'])){
				echo "<div class='col-md-12'><div class='alert alert-$_GET[type]'>$_GET[msg]</div></div>";
			}
		?>
		<form action="update-password.php" method="post">
			<div class="col-md-6">
				<label>Password Lama</label>
				<input type="password" class="form-control input-bbottom radius0" name="password" placeholder="Ketik disini...">
			</div>
			<div class="col-md-6">
				<label>Password Baru</label>
				<input type="password" class="form-control input-bbottom radius0" name="newpass" placeholder="Ketik disini...">
			</div>
			<div class="col-md-6">
				<br>
				<button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Perbarui</button>
				<button type="reset" class="btn btn-default"><span class="fa fa-trash"></span> Reset</button>
			</div>
		</form>
	</div>
</div>
<?php 
	include "slash-sidebar-user.php";
?>
