<?php
/*
* Pull Library Hours rules from JSON.
* Split them up into Regular/Exceptions/Exam Hours
* Erik Olson 8.2.13
*
*/
?>
<div id="schedules">
<?php

	// get relevant semester(s)
	$all_semester_ary = hours_get_current_semesters();
	$json_data = hours_get_semester_json($all_semester_ary);

	// REGULAR HOURS
	foreach ($json_data as $key => $sem):
		$semester_node = field_get_items('node', node_load($all_semester_ary[$key]['nid']), 'field_dates');
		$sem_start = date('M j',strtotime($semester_node[0]['value']));
		$sem_end = date('M j',strtotime($semester_node[0]['value2']));
?>

	<div class="regular-schedule large-12">
		<div class="reg-hours <?php echo strtolower($all_semester_ary[$key]['semester']); ?>">&nbsp;</div>
		<h4 class="subheader"><?php echo $all_semester_ary[$key]['semester']; ?> Hours <span class="sem-dates">(<?php echo $sem_start.'-'.$sem_end; ?>)</span></h4>
		<table>
			<?php
				foreach ($sem as $item):
					if($item->exception == 'No' && $item->exam_hours != 1):
			?>
			<tr>
				<td width="40%"><?php echo $item->display_rule; ?></td>
				<td><?php echo $item->display_time; ?></td>
			</tr>
			<?php
					 endif;
				endforeach;
			?>
		</table>
	</div>
	<?php endforeach; ?>

	<!-- Exam Hours -->
	<?php
		$exam_hours_ary = hours_get_exception('exam_hours');
		if($exam_hours_ary):
	?>
	<div class="exceptions-schedule large-12">
		<h4 class="subheader">Exam Hours <div class="exam-hours">&nbsp;</div></h4>
		<table>
			<?php foreach($exam_hours_ary as $exam): ?>
			<tr>
				<td width="40%"><?= $exam['date_range']; ?></td>
				<td><?= $exam['display']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>

		<?php if(arg(1) == 'hunt' && arg(2) == 'general'): ?>
		<div class="row show-for-small-only">
			<div class="columns medium-12">
				<div class="exam-hours-alert">
					<p><div class="up-triangle"></div>Wolfpack One Card required for entry Dec 4-16.</p>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>


	<!-- EXCEPTIONS -->
	<?php
		$exceptions_hours_ary = hours_get_exception('exceptions');
		if($exceptions_hours_ary):
	?>
	<div class="exceptions-schedule large-12">
		<h4 class="subheader">Exam Hours <div class="exam-hours">&nbsp;</div></h4>
		<table>
			<?php foreach($exceptions_hours_ary as $exception): ?>
			<tr>
				<td width="40%"><?= $exception['date_range']; ?></td>
				<td><?= $exception['display']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>

	<?php echo $srv_exceptions[0]['value']; ?>
	<?php if(arg(2) == 'hill-of-beans' || arg(2) == 'creamery'): ?>
	<p>View <a href="http://www.ncsudining.com/locations/restaurants-cafes/dh-hill-library/">exceptions</a> here.</p>
	<?php endif; ?>

	<?php if(arg(2) == 'common-grounds'): ?>
	<p>View <a href="http://www.ncsudining.com/locations/restaurants-cafes/hunt-library/">exceptions</a> here.</p>
	<?php endif; ?>
</div>





