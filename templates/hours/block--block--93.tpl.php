<?php
/**
 * Lays out all libraries and services
 * Additionally, lays out real-time hours for each library and service
 */
?>

<ul id="libraries">
	<?php
		// load real time hours json
    	$real_time = hours_get_realtime_ary();
		foreach ($real_time as $key => $library):
	?>
	<li>
		<?php
            $today = date('Y-n-j');
            $tomorrow = date('Y-n-j',strtotime($today.' + 1 day'));
			$raw_json = file_get_contents($GLOBALS['base_url'].'/rest_hours/master-hours-feed.json?library='.$library['library'].'&service=22485&date='.$today.'&end_date='.$tomorrow);
			$json = json_decode($raw_json);
            $url_date = (isset($_GET['date'])) ? '?date='.$_GET['date'] : '';
		?>
        <a data-menu="menu" href="<?php echo $GLOBALS['base_url'].'/hours/'.$json[0]->library_short_name.'/'.'general'.$url_date; ?>" <?php if(segment(2)=='general' && segment(1)==$json[0]->library_short_name) echo 'class="nav-active"'; ?>>
            <ul class="schedule">
                <li class="location">
                    <p class="location-title"><?= $json[0]->library_name; if($json[0]->library_name == 'D. H. Hill Library' || $json[0]->library_name == 'James B. Hunt Jr. Library'){echo '*';}?></p>
                </li>
                <li class="availability">
                    <div class="hstatus <?= $json[0]->open_display; ?>"><?= $json[0]->open_display; ?></div>
                    <div class="time"><?= $json[0]->real_time_display; ?></div>
                </li>
            </ul>
        </a>
        <?php if($library['services']): ?>
		<ul>
			<?php foreach($library['services'] as $srv_key => $service): ?>
			<?php
				if($srv_key != 'general'){
					$raw_srv_json = file_get_contents($GLOBALS['base_url'].'/rest_hours/master-hours-feed.json?library='.$library['library'].'&service='.$service.'&date='.$today);
					$srv_json = json_decode($raw_srv_json);
				}
			?>
            <li>
                <a data-menu="menu" href="<?php echo $GLOBALS['base_url'].'/hours/'.$json[0]->library_short_name.'/'.$srv_json[0]->service_short_name.$url_date; ?>" <?php if(segment(2)==$srv_json[0]->service_short_name) echo 'class="nav-active"'; ?>>
                    <ul class="schedule service">
                        <li class="location">
                            <p class="location-title"><?php echo $srv_json[0]->service_name; ?></p>
                        </li>
                        <li class="availability">
		                    <div class="hstatus <?= $srv_json[0]->open_display; ?>"><?= $srv_json[0]->open_display; ?></div>
		                    <div class="time"><?= $srv_json[0]->real_time_display; ?></div>
		                </li>
                    </ul>
                </a>
            </li>
			<?php endforeach; ?>
        </ul>
    	<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ul>

