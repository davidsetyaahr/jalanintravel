<?php 
	include "../../common/top.php";
	$panel['icon'] = "lnr lnr-store";
	$panel['title'] = "Room Hotel";
	$panel['subtitle'] = "Room Hotel / Daftar Room Hotel";
	$title = "Room-Hotel | List Room-Hotel";
	$panel['btn'] = btn_admin("index","Tambah", "add");
	include "../../common/panel.php";


?>
<div class="panel panel-headline">
	<div class="panel-body">
		
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Tipe Room</td>
						<td>Hotel</td>
						<td>Desckripsi</td>
						<td>Foto</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sql = get("select r.room_hotel_id, r.room_type, h.hotel_name, r.room_description, r.img from room_hotel as r join hotels as h on r.hotel_id = h.hotel_id");
						$no = 0;
						foreach ($sql as $room_hotel) {
							$no++;
					 ?>
					 <tr>
					 	<td><?php echo $no ?></td>
					 	<td><?php echo $room_hotel['room_type'] ?> Room</td>
					 	<td><?php echo $room_hotel['hotel_name'] ?></td>
					 	<td><?php echo substr($room_hotel['room_description'],0,100) ?>..</td>
					 	<td><a href="<?php echo base_url()."assets/img/room-hotels/".$room_hotel['img'] ?>" target="_blank"><?php echo $room_hotel['img'] ?></a></td>
					 	<td><a href="edit-room-hotel?id_room_hotel=<?php echo $room_hotel['room_hotel_id'] ?>">Edit</a></td>

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
	include "../../common/slash-panel.php";
	include "../../common/bottom.php";
?>