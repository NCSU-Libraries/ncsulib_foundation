<?php
	$ary = array();
	$util_ary = array('hill'=>22493, 'hunt'=>22494);
	foreach($util_ary as $key=>$lib){
		$raw_json = file_get_contents($GLOBALS['base_url'].'/rest_hours/master-hours-feed.json?library='.$lib.'&service_short_name=general&date='.date('Y-n-j'));
		$json = json_decode($raw_json);
		$ary[$key] = $json[0]->display;
	}
	return $ary;
?>
