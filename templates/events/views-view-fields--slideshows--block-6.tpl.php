<?php
/**
 * Featured Events page
 * Path: /upcomingevents
 * Author: Erik Olson
 * Date: December 2013
 *
 * Simply adding classes in order to fit into 960gs
 */
  drupal_add_js('sites/all/themes/ncsulibraries/scripts/slideshow_controls.js', 'file');
?>

<?php foreach ($fields as $id => $field): ?>
    <?php if (!empty($field->separator)): ?>
        <?php print $field->separator; ?>
    <?php endif; ?>
    <?php if ($field->class == "title"):?>
    <div class="override-slidetext">
    <?php endif; ?>
    <?php print $field->wrapper_prefix; ?>
        <?php print $field->label_html; ?>
        <?php print $field->content; ?>
    <?php print $field->wrapper_suffix; ?>
    <?php if ($field->class == "body"):?>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
