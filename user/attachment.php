<?php 
	include "sidebar-user.php";
	$data = get("select attachment from booking_package where kode_booking_package = '".$_GET['q']."'");
?>
<div class="col-md-9 user-right">
<?php 
	if(isset($_GET['msg'])){
		echo "<div class='alert alert-success'><b>Lampiran Berhasil Dikirim</b></div>";
	}
?>
<label>Lampiran</label>
<div class="thumbnail">
	<div class="row">
		<?php 
			$ex = explode(",", $data[0]['attachment']);
			foreach ($ex as $value) {
		?>
		<div class="col-md-3">
			<center>
				<img src="<?php echo base_url()."assets/img/attachment/$value" ?>" class="img-responsive">						
			</center>
		</div>
		<?php } ?>
	</div>
</div>
<form id="attachment">
<label>Foto KTP <span class="error" id="errorfile"></span></label>
<input type="hidden" name="kode_booking_package" value="<?php echo $_GET['q'] ?>">
<div class="row" id="addfile">
	<div class="col-md-6">
		<span class="error" id="error_file_ex0"></span>
		<input type="file" class="form-control file" name="file[]" id="file0">
	</div>
</div>
<br>
<button class="btn btn-default btn-addfile" type="button">Tambah File</button>
<button class="btn btn-success">Upload</button>
</form>

<?php 
	include "slash-sidebar-user.php";
?>
