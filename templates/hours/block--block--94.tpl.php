<?php
/*
* Pull Library Hours rules from JSON.
* Split them up into Regular/Exceptions/Exam Hours
* Erik Olson 8.2.13
*
*/
?>
<div id="schedules" class="grid-4">
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

	<div class="regular-schedule">
		<div class="reg-hours <?php echo strtolower($all_semester_ary[$key]['semester']); ?>">&nbsp;</div>
		<h3><?php echo $all_semester_ary[$key]['semester']; ?> Hours <span class="sem-dates">(<?php echo $sem_start.'-'.$sem_end; ?>)</span></h3>
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
		$exam_hours = FALSE;
		foreach ($json_data as $key => $sem){
			foreach ($sem as $item){
				if($item->exam_hours == 1){
					$cur_start_month = date('m',$item->open);
					$cur_end_month = date('m',$item->close);
					$start_month = (isset($_GET['date'])) ? date('m',strtotime($_GET['date'])) : date('m',mktime(0,0,0,date('n'),1,date('Y')));

					if($cur_start_month == $start_month || $cur_end_month == $start_month){
						$exam_hours = TRUE;
					}
				}
			}
		}
	?>
	<?php if($exam_hours): ?>
	<div class="exceptions-schedule">
		<h3>Exam Hours <div class="exam-hours">&nbsp;</div></h3>
		<table>
			<?php
				foreach ($json_data as $key => $sem):
					foreach ($sem as $item):
						if($item->exam_hours == 1):
							$cur_start_month = date('m',$item->open);
							$cur_end_month = date('m',$item->close);
							$start_month = (isset($_GET['date'])) ? date('m',strtotime($_GET['date'])) : date('m',mktime(0,0,0,date('n'),1,date('Y')));
							if($cur_start_month == $start_month || $cur_end_month == $start_month):

			?>
			<tr>
				<td width="40%"><?php echo $item->display_rule; ?></td>
				<td><?php echo $item->display_time; ?></td>
			</tr>
			<?php
							endif;
						endif;
					endforeach;
			?>
			<?php endforeach;?>
		</table>
	</div>
	<?php endif; ?>


	<!-- EXCEPTIONS -->
	<?php
		$exceptions = FALSE;
		foreach ($json_data as $key => $sem){
			foreach ($sem as $item){
				if($item->exception == 'Yes'){
					$cur_start_month = date('m',$item->open);
					$start_month = (isset($_GET['date'])) ? date('m',strtotime($_GET['date'])) : date('m',mktime(0,0,0,date('n'),1,date('Y')));
					if($cur_start_month == $start_month){
						$exceptions = TRUE;
					}
				}
			}
		}
	?>

	<?php if($exceptions): ?>
	<div class="exceptions-schedule">
		<h3>Exceptions <div class="exception-hours">&nbsp;</div></h3>
		<table>
			<?php
				foreach ($json_data as $key => $sem):
					foreach ($sem as $item):
						if($item->exception == 'Yes'):
							$cur_start_month = date('m',$item->open);
							$start_month = (isset($_GET['date'])) ? date('m',strtotime($_GET['date'])) : date('m',mktime(0,0,0,date('n'),1,date('Y')));
							if($cur_start_month == $start_month):

			?>
			<tr>
				<td width="40%"><?php echo $item->display_rule; ?></td>
				<td><?php echo $item->display_time; ?></td>
			</tr>
			<?php
							endif;
						endif;
					endforeach;
			?>
			<?php endforeach;?>
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





