<div class="row">
	<div class="medium-8 columns">
		<h1><?= $title; ?></h1>
		<p><?php print render($content['field_dept_about']); ?></p>
		<?php
			$head_name = $content['field_dept_head']['#object']->field_dept_head['und'][0]['title'];
			$head_url = $content['field_dept_head']['#object']->field_dept_head['und'][0]['url'];
			$interim = $content['field_interim']['#object']->field_interim['und'][0]['value'];
			$assoc_name = $content['field_dept_assochead']['#object']->field_dept_assochead['und'][0]['title'];
			$assoc_url = $content['field_dept_assochead']['#object']->field_dept_assochead['und'][0]['title'];
			$assis_name = $content['field_dept_assisthead']['#object']->field_dept_assisthead['und'][0]['title'];
			$assis_url = $content['field_dept_assisthead']['#object']->field_dept_assisthead['und'][0]['title'];

			echo ($interim == 'interim') ? '<h3>Interim Head</h3>' : '<h3>Head</h3>';
			echo '<p><a href="'.$head_url.'">'.$head_name.'</a></p>';

			if($content['field_dept_assochead']){
				echo '<h3>Associate Head</h3>';
				echo '<p><a href="'.$assoc_url.'">'.$assoc_name.'</a></p>';
			}

			if($content['field_dept_assisthead']){
				echo '<h3>Assistant Head</h3>';
				echo '<p><a href="'.$assis_url.'">'.$assis_name.'</a></p>';
			}
		?>

		<?php if ($content['field_dept_location']): ?>
			<h3>Location</h3>
			<?php print render($content['field_dept_location']); ?>
		<?php endif ?>

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
