<?php 
  $folder = "/jalanintravel/";
  $count_request_uri = strlen($_SERVER['REQUEST_URI']);
  $count_folder = strlen($folder);
  $transparent_menu = "no";

	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);
	$active = array(
		"class" => " class='active'",
		"home" => "",
		"destinations" => "",
		"packages" => "",
		"hotels" => "",
		"about" => "",
		"contact" => "",
		"signin" => "",
		"account" => "",
		"booking" => "",
		"payment" => "",
		"notif" => "",
	);
	if(empty($uri_segments[2])){
		$active['home'] = $active['class'];
		$transparent_menu = "yes";
	}
	else{
		if($uri_segments[2]=="destinations"){
			if(isset($uri_segments[3])){
				if($uri_segments[3]=="detail"){
					$transparent_menu = "yes";
				}
			}
			$active['destinations'] = $active['class'];
		}
		else if($uri_segments[2]=="packages"){
			$active['packages'] = $active['class'];
		}
		else if($uri_segments[2]=="hotels"){
			$active['hotels'] = $active['class'];
		}
		else if($uri_segments[2]=="pages"){
			if($uri_segments[3]=="about"){
				$active['about'] = $active['class'];
			}
			else{
				$active['contact'] = $active['class'];
			}
		}
		else if($uri_segments[2]=="user"){
			$active['signin'] = $active['class'];
				if($uri_segments[3]=="account"){
					$active['account'] = $active['class'];
				}
				else if($uri_segments[3]=="notifications"){
					$active['notif'] = $active['class'];
				}
				else if($uri_segments[3]=="booking" || $uri_segments[3]=="payment" || $uri_segments[3]=="detail-booking"){
					$active['booking'] = $active['class'];
				}
		}
		else if($uri_segments[2]=="booking"){
			$active['packages'] = $active['class'];
		}
	}

	include "function.php";
	include "model.php";
?>