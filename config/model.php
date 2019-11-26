<?php
	date_default_timezone_set("Asia/Jakarta");
	$GLOBALS['con'] = mysqli_connect("localhost","root","");
	mysqli_select_db($GLOBALS['con'], "jalanin");

	function get($select)
	{
		$sql = mysqli_query($GLOBALS['con'], $select);
		$data = [];
		while($d=mysqli_fetch_assoc($sql)){
			$data[] = $d;			
		}
		return $data;
	}
	function insert($tb,$paramFields,$paramValues){
		$fields = implode(",", $paramFields);
		$values = implode(",", $paramValues);
		mysqli_query($GLOBALS['con'], "insert into $tb($fields) values($values)");
	}
	function update($tb,$paramValues,$filter){
		$values = implode(",", $paramValues);
		mysqli_query($GLOBALS['con'], "update $tb set $values $filter");
	}
	function delete($tb,$where){
		mysqli_query($GLOBALS['con'], "delete from $tb $where");
	}
	function special_chars($val){
		return mysqli_real_escape_string($GLOBALS['con'],$val);
	}
?>