<h1><?= $title; ?></h1>
<div class="row">
	<div class="medium-8 columns">
		<p><?php print render($content['field_dept_about']); ?></p>

		<h2>Staff</h2>
		<?= render($content['field_dept_head']); ?>
		<?= render($content['field_dept_assochead']); ?>
		<?= render($content['field_dept_assisthead']); ?>
		<?= render($content['field_dept_staff']); ?>

		<?php if ($content['field_dept_location']): ?>
			<h2>Location</h2>
			<?php print render($content['field_dept_location']); ?>
		<?php endif ?>

		<?php if ($content['field_dept_more_info']): ?>
			<h2>More information</h2>
			<ul>
				<?php foreach($node->field_dept_more_info['und'] as $item): ?>
				<li><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif ?>
		<br />
		<p><a href="/departments">&larr; Back to All Departments &amp; Units</a></p>
	</div>
	<div class="medium-3 columns">
		<h2>Contact</h2>
		<?php if ($content['field_dept_phone']): ?>
			<?php print render($content['field_dept_phone']); ?>
		<?php endif ?>
		<?php if ($content['field_dept_email']): ?>
			<?php print render($content['field_dept_email']); ?>
		<?php endif ?>
	</div>
</div>
