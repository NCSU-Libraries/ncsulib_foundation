<?php
/**
 * SCRC Slideshow
 * Path: /1scrc
 * Author: Charlie Morris
 * Date: ~December 2012
 *
 * Simply adding classes in order to fit into 960gs
 * TODO: Consider moving to preprocessor
 *
 */
?>
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>
  <?php if ($field->class == "title"):?>
    <div class="grid-5 g5-5 omega">
  <?php endif; ?>
  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
  <?php if ($field->class == "body"):?>
    </div>
  <?php endif; ?>
<?php endforeach; ?>
