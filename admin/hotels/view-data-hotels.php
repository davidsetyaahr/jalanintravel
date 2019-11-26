<?php
	include "../common/top.php";
	$panel['icon'] = "lnr lnr-store";
	$panel['title'] = "Hotel";
	$panel['subtitle'] = "Data Hotel / Daftar Hotel";
	$panel['btn'] = btn_admin("index","Tambah hotel","add");
		$title = "hotels | View hotels";

	include "../common/panel.php";
?>
  <div class="panel panel-headline">
  <div class="panel-body">
  <div class="table-responsive">
    <br>
    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <td>No</td>
          <td>Nama Hotel</td>
          <td>Photo</td>
          <td>Bintang</td>
          <td>Alamat</td>
          <td>Deskripsi</td>
          <td>Opsi</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = get("select * from hotels");
        $no = 0;
        foreach ($sql as $hotels) {
          $no++;
         ?>
         <tr>
           <td><?php echo $no ?></td>
           <td><?php echo $hotels ['hotel_name'] ?></td>
            <td><a href="<?php echo base_url()."assets/img/hotels/".$hotels ['photo'] ?>" target="_blank"><?php echo $hotels ['photo'] ?></a></td>
           <td><?php echo $hotels ['star']?></td>
           <td><?php echo $hotels ['address']?></td>
           <td><?php echo $hotels ['descriptions']?></td>
           <td>
             <a href="edit-data-hotels?id_hotels=<?php echo $hotels['hotel_id']?>">EDIT</a>

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
