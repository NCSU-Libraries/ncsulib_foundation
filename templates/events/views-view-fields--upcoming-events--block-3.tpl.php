<?php
  /**
   * Event Listing
   * Author: Erik Olson
   * Date: December 2013
   */
?>
<div class="row">
	<div class="columns large-4">
	<?php foreach ($fields as $id => $field): ?>
		<?php if($field->class == 'field-image-for-event'): ?>
		<?php echo $field->content; ?>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
	<div class="columns large-8">
		<?php foreach ($fields as $id => $field): ?>
			<?php if($field->class == 'title'): ?>
			<h2 class="subheader"><?php echo $field->content; ?></h2>
			<?php endif; ?>
			<?php if($field->class == 'field-time-1'): ?>
			<h4 class="subheader"><?php echo strip_tags($field->content, '<a>'); ?></h4>
			<?php endif; ?>
			<?php if($field->class == 'field-time'): ?>
			<h6 class="subheader"><?php echo $field->content; ?></h6>
			<?php endif; ?>
			<?php if($field->class == 'field-space'): ?>
			<h6 class="subheader"><?php echo $field->content; ?></h6>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
