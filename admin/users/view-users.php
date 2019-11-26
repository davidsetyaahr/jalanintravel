<?php 
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-users";
	$panel['title'] = "Users";
	$panel['subtitle'] = "Users";
	$panel['btn'] = "";
	$title = "Users | View USers";
	include "../common/panel.php";
?>
<div class="panel panel-headline">
	<div class="panel-body">
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td>#</td>
						<td>Email</td>
						<td>First Name</td>
						<td>Last Name</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sql = get("select * from users");
						$no = 0;
						foreach ($sql as $users) {
							$no++;
					 ?>
					 	<tr>
					 		<td><?php echo $no ?></td>
					 		<td><?php echo $users['email'] ?></td>
					 		<td><?php echo $users['first_name'] ?></td>
					 		<td><?php echo $users['last_name'] ?></td>
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