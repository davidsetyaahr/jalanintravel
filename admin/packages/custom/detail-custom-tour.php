<?php 
	include "../../common/top.php";
	$panel['icon'] = "lnr lnr-star";
	$panel['title'] = "Custom Tour";
	$panel['subtitle'] = "Custom Tour / Data Pemesanan";
	$panel['btn'] = "";
	$title = "Custom Tour | Data Pemesanan";
	$tour = get("select c.custom_id,c.address,c.ktp,c.title,d.duration_time,rm.room_type,h.hotel_name,c.departure,a.accommodation_name,c.status,u.first_name,u.last_name from custom_packages c join durations d on c.duration_id = d.duration_id join accommodations a on c.trans_id = a.accommodation_id join room_hotel rm on c.room_id = rm.room_hotel_id join hotels h on rm.hotel_id = h.hotel_id join users u on c.user_id = u.user_id where c.custom_id = '$_GET[q]'");

	include "../../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<label>Judul</label>
				<input type="text" class="form-control" value="<?php echo $tour[0]['title'] ?>" name="" readonly>
				<br>
				<label>Durasi Trip</label>
				<input type="text" class="form-control" value="<?php echo $tour[0]['duration_time'] ?>" name="" readonly>
				<br>
				<label>Keberangkatan</label>
				<input type="text" class="form-control" value="<?php echo tanggalindo(date("D Y-m-d H:i:s",strtotime($tour[0]['departure'])),2)?>" name="" readonly>
				<br>
					<img src="<?php echo base_url()."assets/img/attachment/".$tour[0]['ktp'] ?>" class="img-responsive">

			</div>
			<div class="col-md-6">
				<label>Transportasi</label>
				<input type="text" class="form-control" value="<?php echo $tour[0]['accommodation_name'] ?>" name="" readonly>
				<br>
				<label>Alamat Penjemputan</label>
				<input type="text" class="form-control" value="<?php echo $tour[0]['address'] ?>" name="" readonly>
				<br>
				<label>Penginapan</label>
				<input type="text" class="form-control" value="<?php echo $tour[0]['hotel_name'] ?> (<?php echo $tour[0]['room_type'] ?> Room)" name="" readonly>
				<br>
				<label>User</label>
				<input type="text" class="form-control" value="<?php echo $tour[0]['first_name']." ".$tour[0]['last_name'] ?>" name="" readonly>
				<br>
				<?php 
						if($tour[0]['status']=="0"){
							$status = "Pending";
						}
						else if($data['status']=="1"){
							$status = "Berhasil";
						}
						?>
				<label>Status</label>
				<input type="text" class="form-control" value="<?php echo $status ?>" name="" readonly>
				<br>
				<a class="btn btn-default	" href="<?php echo base_url()."packages/custom/detail?q=".$tour[0]['custom_id'] ?>" target="_blank">Lihat Jadwal Yang Diinginkan</a>
			</div>
		</div>
		<center>
			<a href="reject-custom?custom_id=<?php echo $tour[0]['custom_id'] ?>" class="btn btn-danger">Tolak / Reject</a>
			&nbsp;
			<a href="next-detail?custom_id=<?php echo $tour[0]['custom_id'] ?>" class="btn btn-success">Selanjutnya</a>
		</center>
	</div>
</div>
<?php
	include "../../common/slash-panel.php";
	include "../../common/bottom.php";
?>
