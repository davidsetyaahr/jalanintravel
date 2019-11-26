									<?php
									include "../../config/model.php";
									include "../../config/function.php";
									$notif = get("select * from notif_admin where view = '0' order by notif_id desc");
										if(count($notif)>0){
											foreach ($notif as $dNotif){
												if($dNotif['status']==99){
													$bgNotif = "warning";
													$txtNotif = "Pemesanan Baru Membutuhkan Verifikasi";
												}
												else if($dNotif['status']==11){
													$bgNotif = "primary";
													$txtNotif = "Pembayaran Dicicil Membutuhkan Verifikasi";
												}
												else if($dNotif['status']==2){
													$bgNotif = "success";
													$txtNotif = "Pembayaran Lunas Membutuhkan Verifikasi";
												}
									?>
									<li><a href="<?php echo base_url()."admin/booking/detail-booking?q=".$dNotif['kode_booking_package']."&notif_id=".$dNotif['notif_id'] ?>" class="notification-item"><span class="dot bg-<?php echo $bgNotif ?>"></span><?php echo $dNotif['kode_booking_package']." - ".$txtNotif; ?></a></li>
									<?php } } ?>
