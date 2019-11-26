<?php
  	function base_url(){
		$url = "http://localhost/jalanintravel/";		
		return $url;
	}
	function min_price($package_id)
	{
		$price = get("SELECT prd.sale,prd.price FROM packages_price_detail prd JOIN packages_price pr on prd.price_id = pr.price_id JOIN packages p ON pr.package_id = p.package_id where pr.package_id = '$package_id'");
        $arrPrice = [];
        	foreach ($price as $key => $price) {
                $myprice = ($price['sale']==0) ? $price['price'] : $price['price'] - ($price['sale']*$price['price']/100);
                            $arrPrice[] = [$myprice,$price['sale'],$price['price']];
            }
        $min = min($arrPrice);
        $minPrice = $min[0];
        $sale = $min[1];
        $price = $min[2];
        $data = array(
            "price" => $price,
        	"min_price" => $minPrice,
        	"sale" => $sale,
        );
        return $data;
    }
    function TanggalIndo($date, $tipe){
        if($tipe==1){
        $BulanIndonesia = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $time = substr($date, 11,5);
            $result = $tgl . " " . $BulanIndonesia[(int)$bulan-1] . " ". $tahun." ".$time;
        }
        else if($tipe==2){
        $BulanIndo = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "August", "Sept", "Oct", "Nov", "Dec");
            $arrHari = array(
                "Sun" => "Sunday",
                "Mon" => "Monday",
                "Tue" => "Tuesday",
                "Wed" => "Wednesday",
                "Thu" => "Thursday",
                "Fri" => "Friday",
                "Sat" => "Saturday",
            );
            $hari = substr($date, 0,3);
            $tahun = substr($date, 4, 4);
            $bulan = substr($date, 9, 2);
            $tgl   = substr($date, 12, 2);
            $time = substr($date, 15,5);
            $result = $arrHari[$hari].", ".$tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun." ".$time;       
        }
        return($result);
    }
    function btn_admin($href,$text,$tipe){
        if($tipe=="add"){
            $class = "success";
            $fa = "plus-circle";
        }
        else if($tipe=="view"){
            $class = "primary";
            $fa = "table";
        }
        $btn = "<a href='$href' class='btn btn-$class'><span class='fa fa-$fa'></span> $text</a>";
        return $btn;
    }
    function btn_add(){
        echo '<button type="submit" class="btn btn-success"><span class="fa fa-plus-circle"></span> Save</button>
                <button type="reset" class="btn btn-default"><span class="fa fa-times-circle"></span> Reset</button>';        
    }
    function thisarray($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }  
?>