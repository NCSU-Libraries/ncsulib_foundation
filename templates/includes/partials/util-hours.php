<?php
	$hill_id = '22493';
	$hunt_id = '22494';
	$raw_json = file_get_contents('https://www.lib.ncsu.edu/rest_hours/utility-hours.json?service=22485');
	$decoded_json = json_decode($raw_json, true);
	$array_values = array_values($decoded_json);
	$item = array_shift($array_values);
	$ary = array();
	foreach($decoded_json as $lib){
		if( $lib['library'] == $hill_id || $lib['library'] == $hunt_id){
			if($lib['date'] == date('Y-m-d')){
				$ary[$lib['library_name']] = $lib['time'];
			}
		}
	}

	return $ary;
?>
