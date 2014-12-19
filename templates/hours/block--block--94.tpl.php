<?php
/*
* Pull Library Hours rules from JSON.
* Split them up into Regular/Exceptions/Exam Hours
* Erik Olson 8.2.13
*
*/
?>
<div id="schedules">
<?php $reg_ary = hours_get_reg_schedule($month_ary); ?>
	<div class="regular-schedule large-12">
		<?php foreach ($month_ary as $key=>$sem): ?>
		<div class="reg-hours <?= $key; ?>">&nbsp;</div>

		<h4 class="subheader"><?= $key; ?> Hours <span class="sem-dates">(<?= date('M j',strtotime($sem[0]['sem_start'])).'-'.date('M j',strtotime($sem[0]['sem_end'])); ?>)</span></h4>
			<table>
				<?php foreach($sem as $item): ?>
				<tr>
					<td width="40%"><?= $item['day_range']; ?></td>
					<td><?= $item['hours']; ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		<?php endforeach; ?>
	</div>





	<!-- Exam Hours -->
	<?php
		$exam_hours_ary = hours_get_exception('exam_hours',$month_ary);
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
	</div>
	<?php endif; ?>

	<!-- EXCEPTIONS -->
	<?php
		$exceptions_hours_ary = hours_get_exception('exception',$month_ary);
		if($exceptions_hours_ary):
	?>

	<div class="exceptions-schedule large-12">
		<h4 class="subheader">Exceptions <div class="exception-hours">&nbsp;</div></h4>
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




