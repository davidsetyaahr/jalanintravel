<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnnya / Data Umur";
	$panel['btn'] = btn_admin("range","Tambah","add");
	$title = "Kategori Umur | Kategori Umur";

	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<td>#</td>
					<td>Kategori</td>
					<td>Umur/Usia</td>
					<td>Opsi</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = get("select * from pax_categories");
					$no=0;
					foreach ($sql as $pax_categories) {
						$no++;
					
				 ?>
				 <tr>
				 	<td><?php echo $no ?></td>
				 	<td><?php echo $pax_categories ['name_pax_category'] ?></td>
				 	<td>
				 		<?php 
				 			$ex = explode("-",$pax_categories ['range_age']);
				 			$th = ($ex[1]=="+") ? " tahun keatas" : " sampai $ex[1] tahun";
				 			echo $ex[0].$th;
				 		?>
				 		</td>
				 	<td>
				 		<a href="edit-range?pax_category_id=<?php echo $pax_categories['pax_category_id'] ?>">Edit</a>
				 	</td>
				 </tr>
				 <?php 
				 }
				  ?>
			</tbody>				
			</table>
		</div>
	</div>
</div>
<?php 
	include "../common/slash-panel.php";
	include "../common/bottom.php";
?>