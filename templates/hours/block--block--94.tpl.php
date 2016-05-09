<?php
/*
* Pull Library Hours rules from JSON.
* Split them up into Regular/Exceptions/Exam Hours
* Erik Olson 8.2.13
*
*/
?>
<div id="schedules">
<?php $reg_ary = hours_get_reg_schedule();?>
	<div class="regular-schedule large-12">
		<?php foreach ($reg_ary as $key=>$sem): ?>
		<div class="reg-hours <?= $key; ?>">&nbsp;</div>

		<h4 class="subheader"><?= ucwords($key); ?> Hours <span class="sem-dates">(<?= $sem[0]['semester_dates']; ?>)</span></h4>
		<table>
			<?php foreach($sem as $item): ?>
			<tr>
				<td width="40%"><?= $item['day_range']; ?></td>
				<td><?= $item['open_hours']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endforeach; ?>
				<?php if(arg(1) == 'hill' && arg(2) == 'creamery'): ?>
			<div class="row">
				<div class="columns medium-12">
					<div class="exam-hours-alert">
						<p>The Creamery is closed for the summer.</p>
					</div>
				</div>
			</div>
		<?php endif; ?>
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

	<!-- adverse weather -->
	<?php
		$adverse_weather_ary = hours_get_exception('adverse_weather',$month_ary);
		if($adverse_weather_ary):
	?>
	<div class="exceptions-schedule large-12">
		<h4 class="subheader">Exam Hours <div class="adverse-weather-hours">&nbsp;</div></h4>
		<table>
			<?php foreach($adverse_weather_ary as $w): ?>
			<tr>
				<td width="40%"><?= $w['date_range']; ?></td>
				<td><?= $w['display']; ?></td>
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


	<!-- Adverse Weather -->
	<?php
		$adverse_weather_ary = hours_get_exception('adverse_weather',$month_ary);
		if($adverse_weather_ary):
	?>
	<div class="exceptions-schedule large-12">
		<h4 class="subheader">Adverse Weather <div class="adverse-weather-hours">&nbsp;</div></h4>
		<table>
			<?php foreach($adverse_weather_ary as $w): ?>
			<tr>
				<td width="40%"><?= $w['date_range']; ?></td>
				<td><?= $w['display']; ?></td>
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




