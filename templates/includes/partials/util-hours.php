<?php
	$hill_id = '22493';
	$hunt_id = '22494';
	$raw_json = file_get_contents('http://webdev.lib.ncsu.edu/rest_hours/mobile-hours.json?service=22485');
	$decoded_json = json_decode($raw_json, true);
	$item = array_shift(array_values($decoded_json));
	$ary = array();
	foreach($decoded_json as $lib){
		if( $lib['library_id'] == $hill_id || $lib['library_id'] == $hunt_id){
			if($lib['date'] == date('Y-m-d')){
				$ary[$lib['library_name']] = $lib['display'];
			}
		}
	}
	return $ary;
?>
