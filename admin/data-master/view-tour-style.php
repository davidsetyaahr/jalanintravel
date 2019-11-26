<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-keyboard";
	$panel['title'] = "Lainnya";
	$panel['subtitle'] = "Tour Style / View Tour Style";
	$panel['btn'] = btn_admin("tour_style","Tambah","add");
	$title = "Tour Style | View Tour Style";
	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="table-responsive">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<td>#</td>
					<td>Tour Style</td>
					<td>Icon</td>
					<td>Opsi</td>
				</tr>
			</thead>
			<tbody>
				<?php 	
					$sql = get("select * from tour_style");
					$no=0;
					foreach ($sql as $tour_style) {
						$no++;
				 ?>
				 <tr>
				 	<td><?php echo $no ?></td>
				 	<td><?php echo $tour_style['tour_style_name'] ?></td>
				 	<td><a href="<?php echo base_url()."assets/img/tour-style/".$tour_style ['icon'] ?>" target="_blank"><?php echo $tour_style ['icon'] ?></a></td>
				 	<td><a href="edit-tour-style?id_tour_style=<?php echo $tour_style['tour_style_id']?>">Edit</a></td>
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