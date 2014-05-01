<?php
/**
 * Lays out all libraries and services
 * Additionally, lays out real-time hours for each library and service
 */
?>

<ul id="libraries">
	<?php
		// load library json
		$libraries = hours_get_libraries();

		// load real time hours json
    	$real_time = hours_get_real_time_json();

		foreach ($libraries as $key => $library):
	?>
	<li>
		<a data-menu="menu" href="<?php echo $GLOBALS['base_url'].'/hours/'.$library->name.'/'.'general'; ?>" <?php if(segment(2)=='general' && segment(1)==$library->name) echo 'class="nav-active"'; ?>>
			<ul class="schedule">
				<li class="location">
					<p class="location-title"><?php echo $library->node_title; if($library->node_title == 'D. H. Hill Library' || $library->node_title == 'James B. Hunt Jr. Library'){echo '*';}?></p>
				</li>
				<li class="availability">
					<?php $time = hours_get_library_hours_status($library->nid, '22485',$real_time); ?>
					<div class="hstatus <?php echo $time['class']; ?>"><?php echo $time['status']; ?></div>
					<div class="time"><?php echo $time['msg']; ?></div>
				</li>
			</ul>
		</a>
		<?php if($library->services): ?>
		<ul>
			<!-- split up services into array -->
			<?php  $services = preg_split('/,/',$library->services); ?>
			<?php foreach ($services as $key => $service): ?>
			<?php $service_name = field_get_items('node', node_load($service), 'field_short_name');	?>
			<li>
				<a data-menu="menu" href="<?php echo $GLOBALS['base_url'].'/hours/'.$library->name.'/'.$service_name[0]['value']; ?>" <?php if(segment(2)==$service_name[0]['value']) echo 'class="nav-active"'; ?>>
					<ul class="schedule service">
						<li class="location">
							<p class="location-title"><?php echo node_load($service)->title; ?></p>
						</li>
						<li class="availability">
							<?php $service_time = hours_get_library_hours_status($library->nid,$service,$real_time); ?>
							<div class="hstatus <?php echo $service_time['class']; ?>"><?php echo $service_time['status']; ?></div>
							<div class="time"><?php echo $service_time['msg']; ?></div>
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

<!-- pdf link -->
<h2>Download Hours Schedule</h2>
<ul id="hours-download">
	<li><img src="/images/pdf.gif" alt="PDF icon"><a href="/documents/hours/2014-spring-hours.pdf">Spring 2014 hours</a></li>
</ul>

