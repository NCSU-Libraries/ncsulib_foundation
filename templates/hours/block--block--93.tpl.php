<?php
/**
 * Lays out all libraries and services
 * Additionally, lays out real-time hours for each library and service
 */
?>

<ul id="libraries">
	<?php
		// load real time hours json
    	$real_time = hours_get_real_time_json();
		foreach ($real_time as $key => $library):
	?>
	<li>
	<?php if($library->service == '22485'){ ?>
		<a data-menu="menu" href="<?php echo $GLOBALS['base_url'].'/hours/'.$library->library_short_name.'/'.'general'; ?>" <?php if(segment(2)=='general' && segment(1)==$library->library_short_name) echo 'class="nav-active"'; ?>>
			<ul class="schedule">
				<li class="location">
					<p class="location-title"><?php echo $library->library_name; if($library->library_name == 'D. H. Hill Library' || $library->library_name == 'James B. Hunt Jr. Library'){echo '*';}?></p>
				</li>
				<li class="availability">
					<div class="hstatus <?= $library->display->class; ?>"><?= $library->display->status; ?></div>
					<div class="time"><?= $library->display->msg; ?></div>
				</li>
			</ul>
		</a>
		<?php } else { ?>
		<ul>
			<li>
				<a data-menu="menu" href="<?php echo $GLOBALS['base_url'].'/hours/'.$library->library_short_name.'/'.$library->service_short_name; ?>" <?php if(segment(2)==$library->service_short_name) echo 'class="nav-active"'; ?>>
					<ul class="schedule service">
						<li class="location">
							<p class="location-title"><?php echo $library->service_name; ?></p>
						</li>
						<li class="availability">
							<div class="hstatus <?= $library->display->class; ?>"><?= $library->display->status; ?></div>
							<div class="time"><?= $library->display->msg; ?></div>
						</li>
					</ul>
				</a>
			</li>
		</ul>
		<?php } ?>
	</li>
	<?php endforeach; ?>
</ul>

