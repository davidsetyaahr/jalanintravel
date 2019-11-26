<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Lainnnya/Data Kategori";
	$panel['btn'] = btn_admin("kategori","Tambah","add");
	$title = "Kategori | List Kategori";

	include "../common/panel.php";
?>
<div class="panel panel-headline"> 
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<td>#</td>
					<td>Nama Kategori</td>
					<td>Icon</td>
					<td>Opsi</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = get("select * from categories");
					$no=0;
					foreach ($sql as $categories) {
						$no++;
				 ?>
				 <tr>
				 	<td><?php echo $no ?></td>
				 	<td><?php echo $categories ['category_name'] ?></td>
				 	<td><a href="<?php echo base_url()."assets/img/category/".$categories ['icon'] ?>" target="_blank"><?php echo $categories ['icon'] ?></a></td>
				 	<td><a href="edit-kategori?id_category=<?php echo $categories['category_id']?>">edit</a></td>
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