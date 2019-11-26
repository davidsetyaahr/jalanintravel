<?php 
	include "sidebar-user.php";
?>
<div class="col-md-9 user-right">
	<?php 
		$sql = get("select * from notif_user where user_id = '".$_SESSION['user_id']."' order by notif_id desc");
		foreach ($sql as $key => $value) {
	?>
		<div class="box-border">
			<b>
				<span class="fa fa-bell <?php echo ($value['view']==0) ? "color-green" : "" ?>"></span>
				&nbsp;
				Booking with <?php echo $value['kode_booking_package'] ?>
				<?php 
					if($value['status']==99){
						echo "<span class='error'>Decline</span>, check the attachment that you pinned <a href='attachment?q=$value[kode_booking_package]'>here</a>";
					}
					else if($value['status']==0){
						echo "<span class='color-green'>Verified</span>, Make a Payment <a href='payment?q=$value[kode_booking_package]'>here</a>";
					}
					else if($value['status']==1){
						echo "use the 20% down payment method <span class='color-green'>Success</span>, pay off <a href='repayment?q=$value[kode_booking_package]'>here</a>";
					}
					else if($value['status']==3){
						echo "<span class='color-green'>Paid off</span> check your detail trip <a href='detail-booking?q=$value[kode_booking_package]'>here</a>";
					}
				?>
			</b>
		</div>
		<br>
	<?php
		}
	?>
</div>
<?php 
	mysqli_query($GLOBALS['con'], "update notif_user set view = '1' where user_id = '".$_SESSION['user_id']."' ");
	include "slash-sidebar-user.php";
?>
